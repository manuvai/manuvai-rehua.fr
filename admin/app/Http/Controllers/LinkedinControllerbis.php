<?php

namespace App\Http\Controllers;

use App\Helpers\LinkedinPublisher;
use Illuminate\Http\Request;
use App\Http\Controllers\Linkedin;

class LinkedinControllerbis extends Controller
{
    public function index() {
        $accessToken = 'AQXP4NYi0JS3-T8koS-OE1h1JfC8qXgbE_eGYj-UCmzdUqSiPVF1ok-ZNWJNh1FLYsCfUmrFqaLZJ3aYVJVWcDJHBLdih2AjYvdTdFjAQrk3srQNEjuLCCTTlNvv4hISq7GFF5Jt1I-Hvp4g17wvfZzIPOASOU5BClCbAAqXw6aOy2GbBueMJsLnUNWqSR1b7CfIKQU_Id56qxPWmkJbfosAiGGnKBpIk0RcOGTzdD8j3dVSkkzuwEGMeO_oAPRP1mVjLyTIeRb_bUR5j3FB1slRGVIp5ZZCWQi2MGU91jUQNttuhiYhEFjNFh3SCCvYb5Cn6YOebuEt1VV1rt478wbKwvBjzQ';

        $personID = 'LLyDJOddT6';

        $linkedinPublisher = new LinkedinPublisher($accessToken, $personID, true);
        dd($linkedinPublisher->postText('This post is only for test purpose', 'CONNECTIONS'));
    }
}
