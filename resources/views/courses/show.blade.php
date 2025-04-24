@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">
        Course's Page
    </div>
    <div class="card-body">
        <h2 class="card-title">Name : {{ $course->name }}</h2>
        <p class="card-text">Syllabus : {{ $course->syllabus }}</p>
        <p class="card-text">Duration : {{ $course->duration }}</p>
    </div>

    <hr>
</div>

@stop