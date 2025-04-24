@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">Contact Us Page</div>
    <div class="card-body">
        <form action="{{ url('students/' . $student->id . '/edit') }}" method="POST">
            @csrf
            @method("PATCH")
            <input type="hidden" name="id" value="{{$student->id}}">
            
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{$student->name}}" required><br>
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control"  value="{{$student->address}}" required><br>
            <label for="age">Age</label>
            <input type="number" name="age" id="age" class="form-control"  value="{{$student->age ?: ""}}"><br>
            <label for="mobile">Mobile Number</label>
            <input type="tel" name="mobile" id="mobile" class="form-control"  value="{{$student->mobile}}" required><br>
            <label for="parent-contact">Parent Contact</label>
            <input type="tel" name="parent_contact" id="parent-contact" class="form-control"  value="{{$student->parent_contact ?: ""}}"><br>
            
            <button type="submit">Update</button>
        </form>
    </div>
</div>

@endsection