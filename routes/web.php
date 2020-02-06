<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Middleware\LocaleMiddleware;

/**
 * Switch Language site
 */
Route::get('/select-language/{locale}', function ($locale) {
    $previousRequest = request()->create(url()->previous());
    $segments = $previousRequest->segments();

    // If exists in URI, then remove language from URI
    if (in_array($segments[0], LocaleMiddleware::getSupportedLocales())) {
        unset($segments[0]);
    }

    array_splice($segments, 0, 0, $locale);
    $url = Request::root() . '/' . implode('/', $segments);

    // Add GET parameters
    $query = $previousRequest->query();
    if (count($query)) {
        $url = $url . '?' . http_build_query($query);
    }

    // Save cookie with current locale
    Cookie::queue(Cookie::make(config('language.cookie_locale_name'), $locale));

    return redirect($url);
});

Route::group(['prefix' => LocaleMiddleware::getLocale()], function () {

    /**
     * Default page
     */
    Route::get('/', function () {
        return view('start');
    });

    /**
     * Authentification
     */
    Auth::routes([
        'register' => false,
    ]);

});


