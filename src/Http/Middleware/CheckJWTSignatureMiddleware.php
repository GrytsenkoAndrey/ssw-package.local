<?php

namespace SmartSellWeb\SswPackage\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use SmartSellWeb\SswPackage\Services\CheckJWTSignatureService;
use Symfony\Component\HttpFoundation\Response;

class CheckJWTSignatureMiddleware
{
    function __construct(private CheckJWTSignatureService $checkJWTSignature)
    {
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header('token');

        if(!$token) {
            return response()->json(['message' => 'JVT token was not found in the request headers'], Response::HTTP_UNAUTHORIZED);
        }

        if ($this->checkJWTSignature->handle($token)) {
            return $next($request);
        }

        return response()->json(['message' => 'Invalid JWT signature'], Response::HTTP_UNAUTHORIZED);
    }
}
