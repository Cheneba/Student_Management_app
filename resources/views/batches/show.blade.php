@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">
        Batches
    </div>
    <div class="card-body">
        <h2 class="card-title">Name : {{ $batch->name }}</h2>
        <p class="card-text">Course ID : {{ $batch->course_id }}</p>
        <p class="card-text">Start Date : {{ $batch->start_date }}</p>
    </div>

    <hr>
</div>

@stop