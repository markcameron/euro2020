<?php namespace App\Http\Middleware;

use Closure;

class UpdateLastSeen
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
        $user = $request->user();

        if ($user) {
            $user->last_seen = now();
            $user->save();
        }

        return $next($request);
    }
}
