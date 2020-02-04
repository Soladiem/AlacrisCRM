<?php

namespace App\Http\Middleware;

use Agent;
use Closure;

class LocaleMiddleware
{
    /**
     * Default locale
     * @var string
     */
    private static $defaultLocale;

    /**
     * Cookie name for store locale
     * @var string
     */
    private static $nameCookieLocale;

    /**
     * Cache active languages
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
        self::$cache = $data;
    }

    /**
     * Get current locale
     *
     * @return string
     */
    public static function getLocale(): string
    {
        if (static::containsLanguageUri()) {
            if (in_array(request()->segment(1), static::getSupportedLocales())) {
                return request()->segment(1); // Return Language from URI
            }
        }

        // Return Language from Cookie
        if ($lang = request()->cookies->get(static::$nameCookieLocale)) {
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
     * @param         $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }

    private static function getBrowserLanguage(): string
    {
        $uAgentLanguages = Agent::languages();
        if (isset($uAgentLanguages[0])) {
            return htmlspecialchars($uAgentLanguages[0]);
        }
        return static::$defaultLocale ?? strtolower(config('app.locale'));
    }

    private static function containsLanguageUri(): bool
    {
        if (in_array(request()->segment(1), static::getSupportedLocales())) {
            return true;
        }
        return false;
    }
}
