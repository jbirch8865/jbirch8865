<?php

namespace App\Http\Middleware;

use Closure;

class Object_Validate_Relations
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
        global $toolbelt_base;

        ///Employees
        $toolbelt_base->People->Clear_Where_Statement(true);
        $toolbelt_base->People->InnerJoinWith($toolbelt_base->People_Belong_To_Company->
        Get_Column('people_id'),$toolbelt_base->People->Get_Column('id'),true);
        $toolbelt_base->People->LimitBy(
        $toolbelt_base->People_Belong_To_Company->Get_Column('company_id')->
        Equals($toolbelt_base->Get_Company()->Get_Verified_ID()),true);

        return $next($request);
    }
}
