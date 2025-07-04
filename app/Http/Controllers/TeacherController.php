<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Teacher;
use Illuminate\View\View;
use PhpParser\Node\Expr\Cast\Bool_;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $teachers = Teacher::where("deleted", null)->get();
        return view('teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view("teacher.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        $teacher = Teacher::create($input);
        return redirect("teacher")->with("flash_message", "Teacher Added!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $teacher = Teacher::findOrfail($id);

        if (!$this->isDeleted($teacher)) {
            return view("teacher.show", compact('teacher'));
        } else {
            throw new NotFoundHttpException();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teacher = Teacher::findOrfail($id);

        if (!$this->isDeleted($teacher)) {
            return view("teacher.edit", compact('teacher'));
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

        $teacher = Teacher::findOrfail($id);
        $teacher->update($data);

        return redirect("teacher/$id");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher = Teacher::findOrfail($id);

        if (!$this->isDeleted($teacher)) {
            $teacher->deleted = true;
            $teacher->deleted_at = now();
            $teacher->save();
        }

        return redirect()->back()->with("message", "Course Deleted Successfully");
    }

    public function isDeleted($teacher)
    {
        return $teacher->deleted == 1;
    }
}
