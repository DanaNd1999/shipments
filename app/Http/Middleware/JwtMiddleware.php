<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Exception;

class JwtMiddleware  {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {

     if ( !auth()->check()) {
            return response()->json( [ 'status' => 'invalid Token' ], 401 );
        }

    return $next( $request );
}
}
