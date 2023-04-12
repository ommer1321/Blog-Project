<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleControl
{
 
    public function handle(Request $request, Closure $next)
    {
     
        $user = Auth::user();

        if ($user && $user->role != 'admin' ) {
            return  redirect()->route('index.task');
            //hata:basic burası Ana sayfaya yonlendirilecek
        } 

        return $next($request);
    }
}
