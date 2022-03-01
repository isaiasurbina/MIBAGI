<?php

namespace App\Http\Middleware;

use App\Role;
use Closure;

class Buyer
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
        $role = Role::where('name','buyer')->first();
        
        if (! $request->user()->hasRole($role->id)) {
            return redirect('/home')->with('alert-warning','No tiene permisos para esta area');
        }else{
            return $next($request);
        }
    }
}
