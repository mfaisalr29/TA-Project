<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();
        Log::info('Checking role for user', ['user' => $user, 'required_role' => $role]);
    
        if (!$user || !$request->user()->tokenCan('role:' . $role)) {
            Log::info('User does not have access', ['user' => $user, 'required_role' => $role]);
            return redirect('/login')->with('error', 'You do not have access to this page.');
        }
    
        Log::info('User has access', ['user' => $user, 'required_role' => $role]);
        return $next($request);
    }
}
