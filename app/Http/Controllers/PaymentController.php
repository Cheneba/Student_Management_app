<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Payment;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::where("deleted", null)->get();
        return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $enrollments = Enrollment::pluck('enroll_no', 'id');
        return view("payments.create", compact('enrollments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $payment = Payment::create($input);
        return redirect("payments")->with("flash_message", "Payment Added!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payment = Payment::findOrfail($id);

        if (!$this->isDeleted($payment)) {
            return view("payments.show", compact('payment'));
        } else {
            throw new NotFoundHttpException();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $enrollments = Enrollment::pluck('enroll_no', 'id');
        $payment = Payment::findOrfail($id);

        if (!$this->isDeleted($payment)) {
            return view("payments.edit", compact('payment', 'enrollments'));
        } else {
            throw new NotFoundHttpException();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        $payment = Payment::findOrfail($id);
        $payment->update($data);

        return redirect("payment/$id");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $payment = Payment::findOrfail($id);

        if (!$this->isDeleted($payment)) {
            $payment->deleted = true;
            $payment->deleted_at = now();
            $payment->save();
        }

        return redirect()->back()->with("message", "Payment Deleted Successfully");
    }

    public function isDeleted($payment)
    {
        return $payment->deleted == 1;
    }
}
