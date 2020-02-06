<?php

namespace App\Http\Middleware;

use App;
use App\Exceptions\UnsupportedLocaleException;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Redirect;
use Str;

class LocaleMiddleware
{
    /**
     * Cache active languages
     *
     * @var string
     */
    private static $cache;

    /**
     * Setter for $cache
     *
     * @param string $data
     */
    public static function setCache(string $data): void
    {
        static::$cache = $data;
    }

    /**
     * Get current locale
     *
     * @return string
     */
    public static function getLocale(): string
    {
        // Return Language from URI
        if (static::containsLanguageUri()) {
            return request()->segment(1);
        }

        if ($lang = request()->cookies->get(config('language.cookie_locale_name'))) {
            return $lang;
        }

        return static::getBrowserLanguage();
    }


    /**
     * Get allowed languages (status = 1)
     *
     * @return array
     */
    public static function getSupportedLocales(): array
    {
        $languages = [];
        $cache = json_decode(static::$cache);

        foreach ($cache as $value) {
            if ($value->status === 1) {
                $languages[] = strtolower($value->code);
            }
        }

        return $languages;
    }

    /**
     * Handle Middleware
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     * @throws UnsupportedLocaleException
     */
    public function handle(Request $request, Closure $next)
    {
        if (!in_array(config('language.default_locale'), static::getSupportedLocales())) {
            throw new UnsupportedLocaleException('Invalid default locale used.');
        }

        // If the route does contain language
        if (static::containsLanguageUri()) {
            $this->setLocale($request->segment(1));

            // Save cookie with current locale (only guest)
            if (!auth()->check()) {
                cookie()->queue(
                    config('language.cookie_locale_name'),
                    $request->segment(1)
                );

            } else {
                $this->setUserLocale();
            }

        } else {

            $routeExists = false;
            $routeCollection = collect(Route::getRoutes()->getRoutes())->pluck('uri');
            $uri = request()->segments();

            $requestUri = empty($uri)
                ? static::getLocale()
                : static::getLocale() . '/' . implode('/', $uri);

            foreach ($routeCollection as $route) {
                if ($this->compareLocale($route, $requestUri)) {
                    $routeExists = true;
                    break;
                }
            }

            // Redirect only for exists routes
            if ($routeExists) {
                return Redirect::to('/' . $requestUri);
            }
        }

        return $next($request);
    }

    /**
     * Set Locale
     *
     * @param $locale
     */
    private function setLocale($locale): void
    {
        if (!in_array($locale, static::getSupportedLocales())) {
            $locale = config('language.default_locale');
        }

        // Set App Language
        App::setLocale($locale);
    }

    private function setUserLocale(): void
    {
        $user = auth()->user();

        if (request()->hasCookie(config('language.cookie_locale_name'))) {
            $lang = request()->cookies->get(config('language.cookie_locale_name'));
            App::setLocale($lang);
        } else {
            if ($user->locale) {
                $this->setLocale($user->locale);
            } else {
                $this->setDefaultLocale();
            }
        }
    }

    private function setDefaultLocale(): void
    {
        if (config('language.browser_locale')) {
            $this->setLocale($this->getBrowserLanguage());
        } else {
            $this->setLocale(config('language.default_locale'));
        }
    }

    private static function getBrowserLanguage(): string
    {
        $browserLocales = request()->getLanguages();
        if (isset($browserLocales[0])) {
            return Str::kebab(Str::camel(strtolower($browserLocales[0])));
        }

        return config('language.default_locale');
    }

    private static function containsLanguageUri(): bool
    {
        if (in_array(request()->segment(1), static::getSupportedLocales())) {
            return true;
        }
        return false;
    }

    private function compareLocale($string1, $string2): bool
    {
        return (strcmp($string1, $string2) == 0);
    }
}
