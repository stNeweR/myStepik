<?php

namespace App\Http\Middleware;

use App\Models\Theme;
use Closure;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $theme = Theme::query()->findOrFail($request->route("theme_id"));

        if (Gate::allows("isAuthor", $theme->course->id)) {
            return $next($request);
        }
        abort(404);
    }
}
