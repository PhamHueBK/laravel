<?php
    namespace App\Http\Middleware;
    use Closure;
    use Auth;
    class check
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
            if(!Auth::check()) {
                return redirect('/login?permission=admin');
            }
            else if(Auth::check() && Auth::user()->permission != 1) {
                return redirect('/');
            }
             else {
                return $next($request);
            }
        }
    }
?>