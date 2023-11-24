<?php

namespace SmartSellWeb\SswPackage\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckJWTSignatureMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        list($base64UrlHeader, $base64UrlPayload, $receivedSignature) = explode('.', $request->header('token'));

        $secret = config('ssw-package-local.jwt.secret');
        $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $secret, true);
        $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

        if ($base64UrlSignature !== $receivedSignature) {
            return response()->json(['message' => 'Invalid JWT signature'], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
