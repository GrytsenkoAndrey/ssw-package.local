<?php

declare(strict_types=1);

namespace SmartSellWeb\SswPackage\Services;

class CheckJWTSignatureService
{
    /**
     * Check JWT token signature.
     */
    public function handle(string $token): bool
    {
        [$base64UrlHeader, $base64UrlPayload, $receivedSignature] = explode('.', $token);
        $secret = config('ssw-package-local.jwt.secret');
        $signature = hash_hmac('sha256', $base64UrlHeader.'.'.$base64UrlPayload, $secret, true);
        $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
        if ($base64UrlSignature !== $receivedSignature) {
            return false;
        }

        return true;
    }
}
