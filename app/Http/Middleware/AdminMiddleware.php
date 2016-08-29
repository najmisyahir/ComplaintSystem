<?php 

namespace App\Http\Middleware;
use Closure;
use App\Http\Requests;

class AdminMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    /*public function handle($request, Closure $next)
    {
        if (!Entrust::hasRole('admin')) {
            return redirect('home');//Redirect to any page you wish.
        }
    }*/

}