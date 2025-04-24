@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">
        Student's Page
    </div>
    <div class="card-body">
        <h2 class="card-title">Name : {{ $student->name }}</h2>
        <p class="card-text">Address : {{ $student->address }}</p>
        <p class="card-text">Age : {{ $student->age }}</p>
        <p class="card-text">Mobile : {{ $student->mobile }}</p>
        <p class="card-text">Parent Contact : {{ $student->parent_contact }}</p>
    </div>

    <hr>
</div>

@stop