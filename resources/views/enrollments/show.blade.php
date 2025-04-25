@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">
        Enrollments
    </div>
    <div class="card-body">
        <h2 class="card-title">Enrollment Number : {{ $enrollment->enroll_no }}</h2>
        <p class="card-text">Batch ID : {{ $enrollment->batch_id }}</p>
        <p class="card-text">Student ID : {{ $enrollment->student_id }}</p>
        <p class="card-text">Join Date : {{ $enrollment->join_date }}</p>
        <p class="card-text">Fee : {{ $enrollment->fee }}</p>
    </div>

    <hr>
</div>

@stop