<?php

namespace Bomm\Http\Middleware;

use Bomm\Entities\Call;
use Bomm\Entities\Group;
use Closure;
use Illuminate\Support\Facades\Auth;

class StepMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $step)
    {
        $group = Auth::user()->group()->first();

        if(!$group)
            return back();

        $call = $group->call()->first();

        if( !$call || $call->step < $step)
            return back();
        return $next($request);
    }
}
