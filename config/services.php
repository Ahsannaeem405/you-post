<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => url("/auth/google/callback"),
    ],
    'facebook' => [
        'client_id' => env('FACEBOOK_CLIENT_ID'),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
        'redirect' => url("/auth/facebook/callback"),
    ],

    'instagram' => [
        'client_id' => env('INSTAGRAM_CLIENT_ID'),
        'client_secret' => env('INSTAGRAM_CLIENT_SECRET'),
        'redirect' => url("/connect_instagram/calback"),
    ],
    'linkedin' => [
               // 'client_id' => '86k9qgvzogwtyu',
        // 'client_secret' => 'f7W3hq2FzCDnKckO',
        'client_id' => '77l861fu7qz6ly',
         'client_secret' => '2JCRuJKoFqCsHB3w',
        'redirect' => url("/connect_linkedin/calback"),
    ],
    'twitter' => [
        'client_id' => env('TWITTER_CLIENT_ID'),
        'client_secret' => env('TWITTER_CLIENT_SECRET'),
        'redirect' => url('/connect_to_twitter/calback'),
    ],

];


//Consumer Keys

// JjYj3lMGzC4nghgmnR03JsZP5
// FsFO1Rvzfe35ul9Ww1jfbS5LbEuWY024R6jLNz7ZhxhrtIRTMc


//Authentication Tokens

//AAAAAAAAAAAAAAAAAAAAAKFqngEAAAAA23vVX43q2LbHZsfLqA6eSUAAXzQ%3DA6CfeZS5gRZFs0DFLuy07kFTErWQOGV7uI6a2Gij6q8BlytV2X


// 26968990-m2Kno6Ub7cqd7kzAL5C25mrY9WhvuJn1MmAWVSiCd
// 08GWU8IOuMbGMWEASaluHFWdTG9tw2ErRQriZGR16X7Ar


//OAuth 2.0 Client ID and Client Secret
//b29vREJuUU5wMDFDNkQzVkhmYzA6MTpjaQ
//xM_OBMzdnCOT7AJYl3A1YXxLOoDaDfQW1D0LGKckoarhFpzVcM





