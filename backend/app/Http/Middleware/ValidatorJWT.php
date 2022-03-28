<?php

namespace App\Http\Middleware;

use App\Models\Usuario;
use \Firebase\JWT\JWT;

use Closure;

class ValidatorJWT
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $key = env('SECRET_KEY');
        $time_now = strtotime(now());

        try {
            $decoded = JWT::decode($request->bearerToken(), $key, array('HS256'));
            $decoded->iat+3600 < $time_now;

        } catch (\Throwable $th) {
            return redirect('api/error');
        }

        return $next($request);
    }
}
