<?php

namespace App\Http\Controllers;

use App\Helpers\LinkedinPublisher;
use App\Models\LinkedinPost;
use App\Models\Setting;

class LinkedinScheduler extends Controller
{

    public function index(string $accessToken) {
        if ($accessToken != Setting::get('linkedin_access_token')) {
            return response('Bad request', 400);
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
        dd($curlPost);
        
    }

    private function publishPost($postToPublish, $linkedinPublisher, $formattedPost) {
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
        $posts = LinkedinPost::where('state', 'ready')->get();
        return count($posts) > 0 ? $posts[0] : null;
    }
}
