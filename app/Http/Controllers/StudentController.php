<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use App\Models\Student;
use Illuminate\View\View;
use PhpParser\Node\Expr\Cast\Bool_;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $students = Student::where("deleted", null)->get();
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view("student.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        $student = Student::create($input);
        return redirect("students")->with("flash_message", "Student Added!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $student = Student::findOrfail($id);

        if (!$this->isDeleted($student)) {
            return view("student.show", compact('student'));
        } else {
            throw new NotFoundHttpException();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrfail($id);

        if (!$this->isDeleted($student)) {
            return view("student.edit", compact('student'));
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

        $student = Student::findOrfail($id);
        $student->update($data);

        return redirect("students/$id");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrfail($id);

        if (!$this->isDeleted($student)) {
            $student->deleted = true;
            $student->deleted_at = now();
            $student->save();
        }

        return redirect()->back()->with("message", "Deleted Successfully");
    }

    public function isDeleted($student)
    {
        return $student->deleted == 1;
    }
}
