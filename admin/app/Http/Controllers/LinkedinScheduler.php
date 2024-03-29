<?php

namespace App\Http\Controllers;

use App\Helpers\LinkedinPublisher;
use App\Models\LinkedinPost;
use App\Models\Setting;
use Carbon\Carbon;
use DateTime;

class LinkedinScheduler extends Controller
{

    public function index(string $accessToken) {
        if ($accessToken != Setting::get('linkedin_profile_id')) {
            return response('Bad request', 400);
        }

        if (!$this->isTimeToPublish()) {
            return response('Already published', 200);
        }

        $postToPublish = $this->findPostToPublish();

        if (is_null($postToPublish)) {
            return response('No post to publish', 200);
        }

        $formattedPost = $this->formatPost($postToPublish);
        
        if (is_null($formattedPost)) {
            return response('Bad request', 400);
        }

        $linkedinPublisher = new LinkedinPublisher(
            Setting::get('linkedin_access_token'),
            Setting::get('linkedin_profile_id'),
            false
        );

        $curlPost = $this->publishPost($postToPublish, $linkedinPublisher, $formattedPost);
        $this->updatePost($postToPublish);
    }

    private function isTimeToPublish() {
        $toPublish = false;
        $nbPostPublished = LinkedinPost::whereNotNull('published_date')->count();

        // si aucun post n'a été publié
        if ($nbPostPublished <= 0) {
            $toPublish = !$toPublish;
        } else {
            // sinon si la date prévue de publication est passée ou le jour actuel
            $scheduledPosts = LinkedinPost::where('state', 'ready')
                ->whereNotNull('scheduled_date')
                ->orderBy('scheduled_date', 'ASC')
                ->get();

            if (count($scheduledPosts) > 0) {
                $scheduledDate = new DateTime($scheduledPosts[0]->scheduled_date);
                $nowDate = new DateTime(date("Y-m-d"));
                $daysPassed = (int) $nowDate->diff($scheduledDate)->format('%a');
                if ($daysPassed <= 0) {
                    $toPublish = !$toPublish;
                }
            }

            if (!$toPublish) {
                // sinon si la date de publication du dernier et l'intervalle est cohérent
                $lastPost = LinkedinPost::where('state', 'published')
                    ->orderBy('published_date', 'DESC')
                    ->get()[0];
                    
                $publishedDate = new DateTime($lastPost->published_date);
                $nowDate = new DateTime(date("Y-m-d"));
                $daysPassed = (int) $nowDate->diff($publishedDate)->format('%a');
                $toPublish = $daysPassed >= Setting::get('linkedin_publish_interval_days');

            }
            
        }

        return $toPublish;
            
    }

    private function updatePost(LinkedinPost $linkedinPost) {
        $linkedinPost->state = 'published';
        $linkedinPost->published_date = Carbon::now();
        $linkedinPost->update();

    }

    private function publishPost($postToPublish, LinkedinPublisher $linkedinPublisher, $formattedPost) {
        $curlResponse = null;
        switch ($postToPublish->getType()) {
            case LinkedinPost::SINGLE_MEDIA_POST_TYPE:
                $curlResponse = $linkedinPublisher->postPhoto(
                    $formattedPost['message'],
                    $formattedPost['image_path'],
                    $formattedPost['image_title'],
                    $formattedPost['image_description'],
                );

                break;
            case LinkedinPost::DOCUMENT_POST_TYPE:
                $curlResponse = $linkedinPublisher->postPDF(
                    $formattedPost['message'],
                    $formattedPost['pdf_path'],
                    $formattedPost['pdf_title'],
                    $formattedPost['pdf_description'],
                );
                dd($curlResponse);

                break;
                
            case LinkedinPost::MULTIPLE_MEDIA_POST_TYPE:
                $curlResponse = $linkedinPublisher->postMultiplePhotos(
                    $formattedPost['message'],
                    $formattedPost['images']
                );
                break;

            case LinkedinPost::TEXT_POST_TYPE:
                $curlResponse = $linkedinPublisher->postText($formattedPost['message']);
                break;
            
            default:
                break;
        }

        return $curlResponse;
    }

    private function formatPost(LinkedinPost $linkedinPost): ?array {
        switch ($linkedinPost->getType()) {
            case LinkedinPost::TEXT_POST_TYPE:
                return [
                    'message' => $linkedinPost->description,
                ];
                break;

            case LinkedinPost::SINGLE_MEDIA_POST_TYPE:
                return [
                    'message' => $linkedinPost->description,
                    'image_path' => storage_path('app/public/' . $linkedinPost->medias[0]->path),
                    'image_title' => $linkedinPost->medias[0]->title,
                    'image_description' => $linkedinPost->medias[0]->description,
                ];
                break;

            case LinkedinPost::DOCUMENT_POST_TYPE:
                return [
                    'message' => $linkedinPost->description,
                    'pdf_path' => storage_path('app/public/' . $linkedinPost->medias[0]->path),
                    'pdf_title' => $linkedinPost->medias[0]->title,
                    'pdf_description' => $linkedinPost->medias[0]->description,
                ];
                break;

            case LinkedinPost::MULTIPLE_MEDIA_POST_TYPE:
                return [
                    'message' => $linkedinPost->description,
                    'images' => $this->formatImages($linkedinPost->medias),
                ];
                break;
            
            default:
                break;
        }
    }

    private function formatImages($medias) {
        $responseArray = [];

        $i = 1;
        foreach ($medias as $media) {
            $responseArray["image_{$i}"] = [
                'image_path' => storage_path('app/public/' . $media['path']),
                'desc' => $media['description'],
                'title' => $media['title'],
            ];
            $i++;
        }

        return $responseArray;

    }

    public function findPostToPublish(): ?LinkedinPost {
        $postToPublish = null;
        // si la date prévue de publication est passée ou le jour actuel
        $scheduledPosts = LinkedinPost::where('state', 'ready')
            ->whereNotNull('scheduled_date')
            ->orderBy('scheduled_date', 'ASC')
            ->get();

        if (count($scheduledPosts) > 0) {
            $scheduledDate = new DateTime($scheduledPosts[0]->scheduled_date);
            $nowDate = new DateTime(date("Y-m-d"));
            $daysPassed = (int) $nowDate->diff($scheduledDate)->format('%a');
            if ($daysPassed <= 0) {
                $postToPublish = $scheduledPosts[0];
            }
        }
        if (is_null($postToPublish)) {
            $posts = LinkedinPost::where('state', 'ready')
                ->whereNull('scheduled_date')
                ->orderByRaw('RAND()')
                ->get();
            $postToPublish = count($posts) > 0 ? $posts[0] : null;
        }
        return $postToPublish;
    }
}
