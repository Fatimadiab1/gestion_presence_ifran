<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsCoordinateur
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (!$user || $user->role->nom !== 'coordinateur') {
            session()->flash('error', 'Accès refusé');
            return redirect('/');
        }

        return $next($request);
    }
}
