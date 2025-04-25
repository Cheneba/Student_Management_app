@extends('layout')
@section('content')
<div class="card">
  <div class="card-header">
    <h2>Enrollments</h2>
  </div>
  <div class="card-body">
    <a href="{{ url('/enrollment/create') }}" class="btn btn-success btn-sm" title="Add New Enrollment">
      <i class="fa fa-plus" aria-hidden="true"></i> Add New
    </a>
    <br />
    <br />
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Enroll no</th>
            <th>Batch</th>
            <th>Student</th>
            <th>Join Date</th>
            <th>Fee</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($enrollments as $item)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->enroll_no }}</td>
            <td>{{ $item->batch_id }}</td>
            <td>{{ $item->student_id }}</td>
            <td>{{ $item->join_date }}</td>
            <td>{{ $item->fee }}</td>
            
            <td>
              <a href="{{ url('/enrollment/' . $item->id) }}" title="View Enrollment"><button class="btn btn-primary">View</button></a>
              <a href="{{ url('/enrollment/' . $item->id . '/edit') }}" title="Edit Enrollment"><button class="btn btn-success">Edit</button></a>
              
              <form method="POST" action="{{ url('/enrollment/' . $item->id) }}">
                {{ method_field('DELETE')}}
                @csrf
                <button type="submit" class="btn btn-danger btn-sm" title="Delete Enrollment">Delete</button>
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