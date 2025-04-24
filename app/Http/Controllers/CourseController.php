<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $courses = Course::where("deleted", null)->get();
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view("courses.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $course = Course::create($input);
        return redirect("courses")->with("flash_message", "Course Added!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $course = Course::findOrfail($id);

        if (!$this->isDeleted($course)) {
            return view("courses.show", compact('course'));
        } else {
            throw new NotFoundHttpException();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $course = Course::findOrfail($id);

        if (!$this->isDeleted($course)) {
            return view("courses.edit", compact('course'));
        } else {
            throw new NotFoundHttpException();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $data = $request->all();

        $course = Course::findOrfail($id);
        $course->update($data);

        return redirect("courses/$id");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::findOrfail($id);

        if (!$this->isDeleted($course)) {
            $course->deleted = true;
            $course->deleted_at = now();
            $course->save();
        }

        return redirect()->back()->with("message", "Course Deleted Successfully");
    }

    public function isDeleted($course)
    {
        return $course->deleted == 1;
    }
}
