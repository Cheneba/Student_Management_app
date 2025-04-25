@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">Enrollment Page</div>
    <div class="card-body">
        <form action="{{ url("/enrollment") }}" method="POST">
            @csrf
            <label for="enroll_no">Enroll no</label>
            <input type="text" name="enroll_no" id="enroll_no" class="form-control" required><br>
            
            <label for="batch_id">Batch ID</label>
            <input type="text" name="batch_id" id="batch_id" class="form-control" required><br>
            
            <label for="student_id">Student ID</label>
            <input type="text" name="student_id" id="student_id" class="form-control" required><br>
            
            <label for="join_date">Join Date</label>
            <input type="date" name="join_date" id="join_date" class="form-control" required><br>
            
            <label for="fee">Fee</label>
            <div class="input-group mb-3">
                <input type="number" name="fee" id="fee" class="form-control" placeholder="Fee" aria-describedby="currency" required>
                <div class="input-group-append">
                    <span class="input-group-text" id="currency">FCFA</span>
                </div>
            </div>

            <button type="submit">Create</button>
        </form>
    </div>
</div>

@endsection