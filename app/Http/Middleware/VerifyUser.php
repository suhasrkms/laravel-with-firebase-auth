<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Kreait\Firebase\Auth;
use Kreait\Firebase\Exception\FirebaseException;
use Session;

class VerifyUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
      $uid = Session::get('uid');
      $verify = app('firebase.auth')->getUser($uid)->emailVerified;
        if ($verify == 0) {
          return redirect()->route('verify');
        }
        else{
        return $next($request);
      }
    }
}
