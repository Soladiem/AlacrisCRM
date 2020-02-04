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

Route::get('/', function () {
    return redirect(
        '/' .
        config('app.locale') ?? config('app.fallback_locale')
    );
});

Route::group(['prefix' => LocaleMiddleware::getLocale()], function () {

    /**
     * Default page
     */
    Route::get('/', function (){
        return view('start');
    });

    /**
     * Authentification
     */
    Auth::routes();
});


