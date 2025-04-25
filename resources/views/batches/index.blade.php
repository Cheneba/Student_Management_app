@extends('layout')
@section('content')
<div class="card">
  <div class="card-header">
    <h2>Batches</h2>
  </div>
  <div class="card-body">
    <a href="{{ url('/batches/create') }}" class="btn btn-success btn-sm" title="Add New Batch">
      <i class="fa fa-plus" aria-hidden="true"></i> Add New
    </a>
    <br />
    <br />
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Course</th>
            <th>Start Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($batches as $item)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->course->name }}</td>
            <td>{{ $item->start_date }}</td>
            
            <td>
              <a href="{{ url('/batches/' . $item->id) }}" title="View Batch"><button class="btn btn-primary">View</button></a>
              <a href="{{ url('/batches/' . $item->id . '/edit') }}" title="Edit Batch"><button class="btn btn-success">Edit</button></a>
              
              <form method="POST" action="{{ url('/batches/' . $item->id) }}">
                {{ method_field('DELETE')}}
                @csrf
                <button type="submit" class="btn btn-danger btn-sm" title="Delete Batch">Delete</button>
              </form>
              
            </td>
          </tr>
          @endforeach
          <h2></h2>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection