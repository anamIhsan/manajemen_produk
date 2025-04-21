<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = Session::get('jwt');

        if(!$token){
            return $this->redirectToLogin("Anda harus login terlebih dahulu");
        }

        $payload = JWTAuth::setToken($token)->getPayload();
        $level = $payload->get('level');

        $cekLevel = $level == 'Admin';

        if(!$cekLevel){
            return $this->redirectToLogin("Silahkan login sebagai Admin");
        }

        return $next($request);
    }

    private function redirectToLogin($message){
        return redirect()->route('auth.index')->withErrors($message);
    }
}
