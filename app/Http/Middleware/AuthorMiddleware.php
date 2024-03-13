<?php

namespace App\Http\Middleware;

use App\Models\Course;
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
//        dump($request->route("course_id"));
//        dd($request->route("theme_id"));

        if ($request->route("course_id")) {
            $course = Course::query()->findOrFail($request->route("course_id"));
            if (Gate::allows("isAuthor", $course->id)) {
                return $next($request);
            }
            abort(404);

        } elseif ($request->route("theme_id")) {
            $theme = Theme::query()->findOrFail($request->route("theme_id"));
            if (Gate::allows("isAuthor", $theme->course->id)) {
                return $next($request);
            }
            abort(404);
        }

//        $theme = Theme::query()->findOrFail($request->route("course_id"));
//        dd($course);
//        if (Gate::allows("isAuthor", $theme->course->id)) {
//            return $next($request);
//        }
//        abort(404);
    }
}
