@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Employees</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Company ID</th>
                          <th>Email</th>
                          <th>Phone Number</th>
                          <th colspan="2">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($employees as $employee)
                        <tr>
                          <td>{{ $employee->id }}</td>
                          <td>{{ $employee->first_name }}</td>
                          <td>{{ $employee->last_name }}</td>
                          <td>{{ $employee->company }}</td>
                          <td>{{ $employee->email }}</td>
                          <td>{{ $employee->phone }}</td>
                          <td><a href="{{action('EmployeeController@edit', $employee->id)}}" class="btn btn-warning">Edit</a></td>
                          <td>
                          <form action="{{action('EmployeeController@destroy', $employee->id)}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit">Delete</button>
                          </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <ul class="pagination pagination-lg justify-content-center">
                    {{ $employees->links() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
