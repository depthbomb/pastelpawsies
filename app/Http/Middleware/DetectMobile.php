<?php namespace App\Http\Middleware;

use Agent;
use Closure;
use Illuminate\Http\Request;

class DetectMobile
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
		$force_mobile = $request->force_mobile == 1; // A query string that forces mobile on the backend
		$is_mobile = Agent::isMobile();
		$should_use_mobile = ($force_mobile OR $is_mobile);

		$request->merge(compact('is_mobile', 'should_use_mobile'));

		$res = $next($request);

		return $res;
	}
}
