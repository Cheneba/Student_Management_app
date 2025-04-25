<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Enrollment;
use App\Models\Student;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $enrollments = Enrollment::where("deleted", null)->get();
        return view('enrollments.index', compact('enrollments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $batches = Batch::where('deleted', null)->pluck('name', 'id');
        $students = Student::where('deleted', null)->pluck('name', 'id');
        return view("enrollments.create", compact('batches', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        $enrollment = Enrollment::create($input);
        return redirect("enrollment")->with("flash_message", "Enrollment Added!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $enrollment = Enrollment::findOrfail($id);

        if (!$this->isDeleted($enrollment)) {
            return view("enrollments.show", compact('enrollment'));
        } else {
            throw new NotFoundHttpException();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $enrollment = Enrollment::findOrfail($id);

        if (!$this->isDeleted($enrollment)) {
            return view("enrollments.edit", compact('enrollment'));
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

        $enrollment = Enrollment::findOrfail($id);
        $enrollment->update($data);

        return redirect("enrollment/$id");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $enrollment = Enrollment::findOrfail($id);

        if (!$this->isDeleted($enrollment)) {
            $enrollment->deleted = true;
            $enrollment->deleted_at = now();
            $enrollment->save();
        }

        return redirect()->back()->with("message", "Enrollment Deleted Successfully");
    }

    public function isDeleted($enrollment)
    {
        return $enrollment->deleted == 1;
    }
}