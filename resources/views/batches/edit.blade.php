@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">Batches</div>
    <div class="card-body">
        <form action="{{ url('batches/' . $batch->id) }}" method="POST">
            @csrf
            @method("PATCH")
            <input type="hidden" name="id" value="{{$batch->id}}">
            
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $batch->name }}" required><br>
            <label for="course_id">Course ID</label>
            <input type="text" name="course_id" id="course_id" class="form-control" value="{{ $batch->course_id }}" required><br>
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $batch->start_date }}" required><br>
            
            <button type="submit">Update</button>
        </form>
    </div>
</div>

@endsection