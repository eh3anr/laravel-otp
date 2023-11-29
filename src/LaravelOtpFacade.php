<?php

namespace Eh3anr\LaravelOtp;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Eh3anr\LaravelOtp\Skeleton\SkeletonClass
 */
class LaravelOtpFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-otp';
    }
}
