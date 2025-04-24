@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">
        Teacher's Page
    </div>
    <div class="card-body">
        <h2 class="card-title">Name : {{ $teacher->name }}</h2>
        <p class="card-text">Address : {{ $teacher->address }}</p>
        <p class="card-text">Age : {{ $teacher->age }}</p>
        <p class="card-text">Mobile : {{ $teacher->mobile }}</p>
    </div>

    <hr>
</div>

@stop