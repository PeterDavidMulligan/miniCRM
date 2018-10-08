@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Edit Employee</div>
          <div class="card-body">
              @if (session('status'))
                  <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                  </div>
              @endif
              <table class="table">
                <thead>
                  <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Company ID</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{$employee->first_name}}</td>
                    <td>{{$employee->last_name}}</td>
                    <td>{{$employee->company}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->phone}}</td>
                  </tr>

                  <tr>
                    <td><input type="text" class="form-control" value="{{$employee->first_name}}"></td>
                    <td><input type="text" class="form-control" value="{{$employee->last_name}}"></td>
                    <td><input type="number" step="1" min="0" value="{{$employee->company}}"></td>
                    <td><input type="text" class="form-control" value="{{$employee->email}}"></td>
                    <td><input type="text" class="form-control" value="{{$employee->phone}}"></td>
                  </tr>
                </tbody>
              </table>
              <div class="row justify-content-center">
                <form action="{{action('EmployeeController@edit', $employee->id)}}" method="post">
                  @csrf
                  <input name="_method" type="hidden" value="put">
                  <button class="btn btn-warning" type="submit">Edit</button>
                </form>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
