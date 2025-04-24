@extends('layout')
@section('content')
<div class="card">
  <div class="card-header">
    <h2>Student Application</h2>
  </div>
  <div class="card-body">
    <a href="{{ url('/students/create') }}" class="btn btn-success btn-sm" title="Add New Student">
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
            <th>Address</th>
            <th>Mobile</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($students as $item)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->address }}</td>
            <td>{{ $item->mobile }}</td>
            
            <td>
              <a href="{{ url('/students/' . $item->id) }}" title="View Student"><button class="btn btn-primary">View</button></a>
              <a href="{{ url('/students/' . $item->id . '/edit') }}" title="Edit Student"><button class="btn btn-success">Edit</button></a>
              
              <form method="POST" action="{{ url('/students/remove/' . $item->id)  }}" accept-charset="">
                {{ method_field('DELETE')}}
                @csrf
                <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="">Delete</button>
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