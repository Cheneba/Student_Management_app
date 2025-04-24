@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">Contact Us Page</div>
    <div class="card-body">
        <form action="{{ url('courses/' . $course->id) }}" method="POST">
            @csrf
            @method("PATCH")
            <input type="hidden" name="id" value="{{$course->id}}">
            
            
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $course->name }}" required><br>
            <label for="syllabus">Syllabus</label>
            <input type="text" name="syllabus" id="syllabus" class="form-control" value="{{ $course->syllabus }}" required><br>
            <label for="duration">Duration</label>
            <input type="tel" name="duration" id="duration" class="form-control" value="{{ $course->duration }}" required><br>
            
            <button type="submit">Update</button>
        </form>
    </div>
</div>

@endsection