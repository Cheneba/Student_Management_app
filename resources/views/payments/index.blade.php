@extends('layout')
@section('content')
<div class="card">
  <div class="card-header">
    <h2>Payments</h2>
  </div>
  <div class="card-body">
    <a href="{{ url('/payment/create') }}" class="btn btn-success btn-sm" title="Add New Payment">
      <i class="fa fa-plus" aria-hidden="true"></i> Add New
    </a>
    <br />
    <br />
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Enrollment No</th>
            <th>Paid Date</th>
            <th>Amount</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($payments as $item)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->enrollment->enroll_no }}</td>
            <td>{{ $item->paid_date }}</td>
            <td>{{ $item->amount }}</td>
            
            <td>
              <a href="{{ url('/payment/' . $item->id) }}" title="View Payment"><button class="btn btn-primary">View</button></a>
              <a href="{{ url('/payment/' . $item->id . '/edit') }}" title="Edit Payment"><button class="btn btn-success">Edit</button></a>
              
              <form method="POST" action="{{ url('/payment/' . $item->id) }}">
                {{ method_field('DELETE')}}
                @csrf
                <button type="submit" class="btn btn-danger btn-sm" title="Delete Payment">Delete</button>
              </form>

              <a href="{{ url('/report/report1/' . $item->id ) }}" title="Edit Payment"><button class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i> Print</button></a>
              
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