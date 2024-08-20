<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class  Admin{ 
    


    public function handle(Request $request, Closure $next): Response
    {
        
     // Implement your admin check logic here (e.g., using Laravel's authentication)
     if (!auth()->check()) {
        return redirect('login');
        }
        return $next($request);
    }
}
