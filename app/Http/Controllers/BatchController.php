<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Course;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $batches = Batch::where("deleted", null)->get();
        return view('batches.index', compact('batches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $courses = Course::where('deleted', null)->pluck('name', 'id');
        return view("batches.create", compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        $batch = Batch::create($input);
        return redirect("batches")->with("flash_message", "Batch Added!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $batch = Batch::findOrfail($id);

        if (!$this->isDeleted($batch)) {
            return view("batches.show", compact('batch'));
        } else {
            throw new NotFoundHttpException();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $batch = Batch::findOrfail($id);

        if (!$this->isDeleted($batch)) {
            return view("batches.edit", compact('batch'));
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

        $batch = Batch::findOrfail($id);
        $batch->update($data);

        return redirect("batches/$id");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $batch = Batch::findOrfail($id);

        if (!$this->isDeleted($batch)) {
            $batch->deleted = true;
            $batch->deleted_at = now();
            $batch->save();
        }

        return redirect()->back()->with("message", "Batch Deleted Successfully");
    }

    public function isDeleted($batch)
    {
        return $batch->deleted == 1;
    }
}
