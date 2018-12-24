<?php

namespace App\Http\Middleware;

use Closure;

class IKMMiddleware
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
      $user = $request -> user();

      if($user){
        if($user->isUser()){
          return $next($request);
        }
      } else{
        return redirect('/login')->with('warning', 'Silahkan login untuk menakses halaman ini');
      }


      return redirect(404);
    }
}