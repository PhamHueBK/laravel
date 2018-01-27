<?php
    namespace App\Http\Middleware;
    use Closure;
    use Auth;
    class checkUser
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
            if(!Auth::checkUser()) {
                return redirect('/login');
            } else if(Auth::checkUser() && Auth::user()->permission != 0 && Auth::user()->permission != 1) {
                die("Access denied !!!");
            } else {
                return $next($request);
            }
        }
    }
?>