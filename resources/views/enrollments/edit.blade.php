@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">Enrollment</div>
    <div class="card-body">
        <form action="{{ url('enrollment/' . $enrollment->id) }}" method="POST">
            @csrf
            @method("PATCH")
            <input type="hidden" name="id" value="{{$enrollment->id}}">
            
            <label for="enroll_no">Enroll no</label>
            <input type="text" name="enroll_no" id="enroll_no" class="form-control" value="{{ $enrollment->enroll_no }}" required><br>
            
            <label for="batch_id">Batch ID</label>
            <input type="text" name="batch_id" id="batch_id" class="form-control" value="{{ $enrollment->batch_id }}" required><br>
            
            <label for="student_id">Student ID</label>
            <input type="text" name="student_id" id="student_id" class="form-control" value="{{ $enrollment->student_id }}" required><br>
            
            <label for="join_date">Join Date</label>
            <input type="date" name="join_date" id="join_date" class="form-control" value="{{ $enrollment->join_date }}" required><br>
            
            <label for="fee">Fee</label>
            <div class="input-group mb-3">
                <input type="number" name="fee" id="fee" class="form-control" value="{{ $enrollment->fee }}" placeholder="Fee" aria-describedby="currency" required>
                <div class="input-group-append">
                    <span class="input-group-text" id="currency">FCFA</span>
                </div>
            </div>

            
            <button type="submit">Update</button>
        </form>
    </div>
</div>

@endsection