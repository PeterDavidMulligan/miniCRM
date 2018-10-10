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

                    <form action="{{url('employees/create')}}">
                      @csrf
                      <button class="btn btn-warning" type="submit">Create New +</button>
                    </form>

                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>@lang('ui.id')</th>
                          <th>@lang('ui.first_name')</th>
                          <th>@lang('ui.last_name')</th>
                          <th>@lang('ui.company_id')</th>
                          <th>@lang('ui.email')</th>
                          <th>@lang('ui.phone')</th>
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

                          <td>
                            <form action="{{action('EmployeeController@edit', $employee->id)}}" method="post">
                              @csrf
                              <input name="_method" type="hidden" value="put">
                              <button class="btn btn-warning" type="submit">Edit</button>
                            </form>
                          </td>
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
