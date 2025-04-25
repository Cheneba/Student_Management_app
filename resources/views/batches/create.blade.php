@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">Batches</div>
    <div class="card-body">
        <form action="{{ url("/batches") }}" method="POST">
            @csrf
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required><br>
            
            <label for="course_id">Course</label><br>
            <select name="course_id" id="course_id" class="custom-select" >
                <option value="" selected>Select A Course</option>
                @foreach ($courses as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select><br>
            {{-- <input type="text" name="course_id" id="course_id" class="form-control" required><br> --}}
            
            
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control" required><br>
            
            <button type="submit">Create</button>
        </form>
    </div>
</div>

@endsection