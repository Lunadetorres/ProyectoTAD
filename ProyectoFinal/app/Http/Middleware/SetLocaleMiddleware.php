<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocaleMiddleware
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
        if (Session::has('locale')) {
            $currentLocale = App::getLocale();
            $sessionLocale = Session::get('locale');

            if ($currentLocale !== $sessionLocale) {
                // Locale in the session has changed
                App::setLocale($sessionLocale);
            }
        }

        return $next($request);
    }
}
