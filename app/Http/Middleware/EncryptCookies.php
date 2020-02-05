<?php

namespace App\Http\Middleware;

use Illuminate\Contracts\Encryption\Encrypter as EncrypterContract;
use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware
{
    /**
     * The names of the cookies that should not be encrypted.
     *
     * @var array
     */
    protected $except = [
        'XSRF-TOKEN',
    ];

    /**
     * EncryptCookies constructor.
     *
     * @param EncrypterContract $encrypter
     */
    public function __construct(EncrypterContract $encrypter)
    {
        parent::__construct($encrypter);

        $this->except[] = strtolower(config('app.name')) . '_locale';
    }
}
