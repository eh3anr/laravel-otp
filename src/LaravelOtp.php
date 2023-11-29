<?php

namespace Eh3anr\LaravelOtp;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class LaravelOtp
{
    public function generateCacheKey(string $key): string
    {
        return config('otp.cache-prefix', 'otp:') . $key;
    }

    public function generateOtp(string $key, int $length = 6, \DateTimeInterface|\DateInterval|int $ttl = 300): int
    {
        $otp = random_int(10 ^ $length, 10 ^ ($length + 1) - 1);
        Cache::put($this->generateCacheKey($key), Hash::make($otp), $ttl);
        return $otp;
    }

    public function validateOtp(string $key, string $otp): bool
    {
        $cachedOtp = Cache::get($this->generateCacheKey($key));

        if (!$cachedOtp) {
            return false;
        }

        return Hash::check($otp, $cachedOtp);
    }
}
