<?php

return [

    // Fallback values used when a page/post has not defined its own SEO
    // fields yet. Always prefer setting per-page values via the admin panel.
    'default_description' => env(
        'SEO_DEFAULT_DESCRIPTION',
        'Trusted investment banking advisory services — mergers & acquisitions, capital raising, and strategic financial consulting.'
    ),

    'default_og_image' => env('SEO_DEFAULT_OG_IMAGE', '/images/og-default.jpg'),

    'twitter_handle' => env('SEO_TWITTER_HANDLE'),

    'organization_name' => env('SEO_ORGANIZATION_NAME', env('APP_NAME')),

    // Used for JSON-LD Organization schema.
    'organization_logo' => env('SEO_ORGANIZATION_LOGO', '/images/logo.png'),

    'social_profiles' => array_filter([
        env('SEO_SOCIAL_LINKEDIN'),
        env('SEO_SOCIAL_TWITTER'),
        env('SEO_SOCIAL_FACEBOOK'),
    ]),
];
