<?php

namespace App\Http\Middleware;

use Closure;

class SetLocale
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
		$locale = $request->segment(1);		
		if(!empty($locale)){
			session()->put('locale', $locale);
		}else{
			session()->put('locale', config('app.locale'));
		}
        app()->setLocale(session()->get('locale'));

        return $next($request);
    }
}
