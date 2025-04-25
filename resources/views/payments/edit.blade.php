@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">Payment</div>
    <div class="card-body">
        <form action="{{ url('payment/' . $payment->id) }}" method="POST">
            @csrf
            @method("PATCH")
            <input type="hidden" name="id" value="{{$payment->id}}">
            
            
            <label for="enrollment_id">Enrollment</label><br>
            <select name="enrollment_id" id="enrollment_id" class="custom-select" >
                <option value="" selected>Select An Enrollment</option>
                @foreach ($enrollments as $id => $enroll_no)
                <option value="{{ $id }}" {{ $payment->enrollment->id == $id ? "selected" : "" }}>{{ $enroll_no }}</option>
                @endforeach
            </select><br>

            <label for="paid_date">Paid Date</label>
            <input type="date" name="paid_date" id="paid_date" class="form-control" value="{{ $payment->paid_date }}" required><br>
            <label for="amount">Amount</label>
            <input type="text" name="amount" id="amount" class="form-control" value="{{ $payment->amount }}" required><br>
            
            <button type="submit">Update</button>
        </form>
    </div>
</div>

@endsection