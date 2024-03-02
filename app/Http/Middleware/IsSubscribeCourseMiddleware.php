<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Main\LessonController;
use App\Models\Lesson;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsSubscribeCourseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $lessonId = $request->route("id");
        $lesson = Lesson::query()->findOrFail($lessonId);
        $course = $lesson->course;

        if ($course && Auth::user()) {
//            dd(Auth::user()->subscribeCourse($course->id));
            if (Auth::user()->subscribeCourse($course->id)) {
                return $next($request);
            };
            return redirect()->back();
        }

        return redirect()->back();
    }
}
