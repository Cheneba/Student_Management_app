@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">Teachers Page</div>
    <div class="card-body">
        <form action="{{ url("/teacher") }}" method="POST">
            @csrf
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required><br>
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control" required><br>
            <label for="age">Age</label>
            <input type="number" name="age" id="age" class="form-control"><br>
            <label for="mobile">Mobile Number</label>
            <input type="tel" name="mobile" id="mobile" class="form-control" required><br>
            
            <button type="submit">Create</button>
        </form>
    </div>
</div>

@endsection