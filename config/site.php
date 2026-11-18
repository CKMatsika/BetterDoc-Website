<?php

return [
    'name' => env('SITE_NAME', 'BetterDoc DMS'),
    'tagline' => env('SITE_TAGLINE', 'Document management that works when the internet doesn\'t.'),
    'description' => env('SITE_DESCRIPTION', 'Secure, on-premises document management and workflow platform for organisations that cannot depend on the cloud.'),
    'email' => env('SITE_EMAIL', 'clemence@betterlinkengineering.co.zw'),
    'phone' => env('SITE_PHONE', '+263779613700'),
    'whatsapp' => env('SITE_WHATSAPP', 'https://wa.me/263779613700'),
    'address' => env('SITE_ADDRESS', 'Stand 1225 Crowhill Views, Borrowdale, Harare, Zimbabwe'),
    'company' => env('SITE_COMPANY', 'Betterlink Industries Private Limited'),
    'social' => [
        'linkedin' => env('SITE_LINKEDIN', ''),
        'twitter' => env('SITE_TWITTER', ''),
        'facebook' => env('SITE_FACEBOOK', ''),
    ],
    'logo' => env('SITE_LOGO', 'betterlink-logo.jpeg'),
    'portal_url' => env('SITE_PORTAL_URL', ''),
    'signup_url' => env('SITE_SIGNUP_URL', ''),
    'admin_email' => env('ADMIN_EMAIL', 'clemence@betterlinkengineering.co.zw'),
    'admin_password' => env('ADMIN_PASSWORD', ''),
    'admin_2fa_enabled' => (bool) env('ADMIN_2FA_ENABLED', false),
    'admin_2fa_secret' => env('ADMIN_2FA_SECRET', ''),
    'lead_notification_email' => env('LEAD_NOTIFICATION_EMAIL', env('SITE_EMAIL', 'clemence@betterlinkengineering.co.zw')),
    'standards' => [
        'ISO 27001 controls',
        'OWASP ASVS',
        'Zimbabwe Cyber and Data Protection Act',
    ],
];
