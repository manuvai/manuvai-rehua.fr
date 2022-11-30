<?php

namespace App\Helpers;

use GuzzleHttp\Client;

class LinkedinPublisher
{

    private $accessToken;
    private $ssl;
    private $personID;

    public function __construct(string $accessToken, string $personID, bool $ssl)
    {
        $this->accessToken = $accessToken;
        $this->ssl = $ssl;
        $this->personID = $personID;
    }

    public function getPostURL() {
        return $this->getApiURL('ugcPosts');
    }

    public function getAssetsURL() {
        return $this->getApiURL('assets');
    }

    public function getApiURL(string $key) {
        return "https://api.linkedin.com/v2/{$key}?action=registerUpload&oauth2_access_token=" . $this->accessToken;
    }

    public function linkedInTextPost($message, $visibility = "PUBLIC")
    {
        $post_url = $this->getPostURL();
        $request = [
            "author" => "urn:li:person:" . $this->personID,
            "lifecycleState" => "PUBLISHED",
            "specificContent" => [
                "com.linkedin.ugc.ShareContent" => [
                    "shareCommentary" => [
                        "text" => $message
                    ],
                    "shareMediaCategory" => "NONE",
                ],

            ],
            "visibility" => [
                "com.linkedin.ugc.MemberNetworkVisibility" => $visibility,
            ]
        ];
        $post = $this->curl($post_url, json_encode($request), "application/json", true);
        return $post;
    }

    public function linkedInLinkPost($message, $link_title, $link_desc, $link_url, $visibility = "PUBLIC")
    {
        $post_url = $this->getPostURL();
        $request = [
            "author" => "urn:li:person:" . $this->personID,
            "lifecycleState" => "PUBLISHED",
            "specificContent" => [
                "com.linkedin.ugc.ShareContent" => [
                    "shareCommentary" => [
                        "text" => $message
                    ],
                    "shareMediaCategory" => "ARTICLE",
                    "media" => [[
                        "status" => "READY",
                        "description" => [
                            "text" => substr($link_desc, 0, 200),
                        ],
                        "originalUrl" =>  $link_url,

                        "title" => [
                            "text" => $link_title,
                        ],
                    ]],
                ],

            ],
            "visibility" => [
                "com.linkedin.ugc.MemberNetworkVisibility" => $visibility,
            ]
        ];

        $post = $this->curl($post_url, json_encode($request), "application/json", true);
        return $post;
    }

    public function linkedInPhotoPost($message, $image_path, $image_title, $image_description, $visibility = "PUBLIC")
    {

        $prepareUrl = $this->getAssetsURL();
        $prepareRequest =  [
            "registerUploadRequest" => [
                "recipes" => [
                    "urn:li:digitalmediaRecipe:feedshare-image"
                ],
                "owner" => "urn:li:person:" . $this->personID,
                "serviceRelationships" => [
                    [
                        "relationshipType" => "OWNER",
                        "identifier" => "urn:li:userGeneratedContent"
                    ],
                ],
            ],
        ];
        $prepareReponse = $this->curl($prepareUrl, json_encode($prepareRequest), "application/json");
        $uploadURL = json_decode($prepareReponse)->value->uploadMechanism->{"com.linkedin.digitalmedia.uploading.MediaUploadHttpRequest"}->uploadUrl;
        $asset_id = json_decode($prepareReponse)->value->asset;
        $client = new Client();
        $client->request('PUT', $uploadURL, [
            'headers' => ['Authorization' => 'Bearer ' . $this->accessToken],
            'body' => fopen($image_path, 'r'),
            'verify' => $this->ssl
        ]);

        $post_url = $this->getPostURL();
        $request = [
            "author" => "urn:li:person:" . $this->personID,
            "lifecycleState" => "PUBLISHED",
            "specificContent" => [
                "com.linkedin.ugc.ShareContent" => [
                    "shareCommentary" => [
                        "text" => $message
                    ],
                    "shareMediaCategory" => "IMAGE",
                    "media" => [[
                        "status" => "READY",
                        "description" => [
                            "text" => substr($image_description, 0, 200),
                        ],
                        "media" =>  $asset_id,

                        "title" => [
                            "text" => $image_title,
                        ],
                    ]],
                ],

            ],
            "visibility" => [
                "com.linkedin.ugc.MemberNetworkVisibility" => $visibility,
            ]
        ];
        $post = $this->curl($post_url, json_encode($request), "application/json");
        return $post;
    }
    
    public function linkedInMultiplePhotosPost($message, array $images, $visibility = "PUBLIC")
    {
        // Posting
        $post_url = $this->getPostURL();
        $request = [
            "author" => "urn:li:person:" . $this->personID,
            "lifecycleState" => "PUBLISHED",
            "specificContent" => [
                "com.linkedin.ugc.ShareContent" => [
                    "shareCommentary" => [
                        "text" => $message
                    ],
                    "shareMediaCategory" => "IMAGE",
                    "media" => [],
                ],

            ],
            "visibility" => [
                "com.linkedin.ugc.MemberNetworkVisibility" => $visibility,
            ]
        ];


        // Adding Medias
        $media = [];
        foreach ($images as $key => $image) {

            $uploadedImageInfos = $this->postImage($image);

            $images[$key]['asset_id'] = $uploadedImageInfos['asset_id'];
            $media[$key]["status"] = $uploadedImageInfos["status"];
            $media[$key]["description"]["text"] = $uploadedImageInfos["description"]["text"];
            $media[$key]["media"] = $uploadedImageInfos["media"];
            $media[$key]["title"]["text"] = $uploadedImageInfos["title"]["text"];
    
        }
        
        $request['specificContent']['com.linkedin.ugc.ShareContent']["media"] = array_values($media);
        $post = $this->curl($post_url, json_encode($request), "application/json");
        return $post;
    }

    public function postImage($image) {
        
        $responseInfos = [];

        // Preparing Request
        $prepareUrl = $this->getAssetsURL();
        $prepareRequest =  [
            "registerUploadRequest" => [
                "recipes" => [
                    "urn:li:digitalmediaRecipe:feedshare-image"
                ],
                "owner" => "urn:li:person:" . $this->personID,
                "serviceRelationships" => [
                    [
                        "relationshipType" => "OWNER",
                        "identifier" => "urn:li:userGeneratedContent"
                    ],
                ],
            ],
        ];
        $prepareReponse = $this->curl($prepareUrl, json_encode($prepareRequest), "application/json");
        $uploadURL = json_decode($prepareReponse)->value->uploadMechanism->{"com.linkedin.digitalmedia.uploading.MediaUploadHttpRequest"}->uploadUrl;
        $asset_id = json_decode($prepareReponse)->value->asset;
        $responseInfos['asset_id'] = $asset_id;

        $client = new Client();
        $client->request('PUT', $uploadURL, [
            'headers' => ['Authorization' => 'Bearer ' . $this->accessToken],
            'body' => fopen($image['image_path'], 'r'),
            'verify' => $this->ssl
        ]);
        
        $responseInfos["status"] = "READY";
        $responseInfos["description"]["text"] = substr($image["desc"], 0, 200);
        $responseInfos["media"] = $asset_id;
        $responseInfos["title"]["text"] = substr($image["title"], 0, 200);

        return $responseInfos;
    }

    /**
     * Declaration of the CURL operation to post media or text.
     *
     * @param string $url
     * @param string $encoded_parameters
     * @param string $content_type
     * @param boolean $post
     * @return string
     */
    public function curl(string $url, string $encoded_parameters, string $content_type, bool $post = true): string
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $this->ssl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        if ($post) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $encoded_parameters);
        }

        curl_setopt($ch, CURLOPT_POST, $post);
        $headers = [];
        $headers[] = "Content-Type: {$content_type}";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);

        return $result;
    }
}
