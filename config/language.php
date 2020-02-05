<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Use locale from browser
    |--------------------------------------------------------------------------
    |
    | If value as False then locale from Browser.
    |
    */
    'browser_locale' => true,

    /*
    |--------------------------------------------------------------------------
    | Default locale
    |--------------------------------------------------------------------------
    |
    | Default locale when no.
    |
    */
    'default_locale' => strtolower(config('app.locale')),

    /*
    |--------------------------------------------------------------------------
    | Cookie name for Locale
    |--------------------------------------------------------------------------
    |
    | Used to store a custom locale.
    |
    */
    'cookie_locale_name' => strtolower(config('app.name')) . '_locale',

];
