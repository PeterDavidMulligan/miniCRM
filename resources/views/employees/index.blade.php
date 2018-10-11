@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">@lang('ui.employees')</div>
                <div class="card-body">

                    <div class="container" name="alertsContainer">
                      @if (count($errors) > 0)
                      <div class = "alert alert-warning">
                        <ul>
                          @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div>
                      @endif
                    </div>

                    <form action="{{url('employees/create')}}">
                      <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                      <button class="btn btn-warning" type="submit">@lang('ui.create_employee')</button>
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
                          <th colspan="2">@lang('ui.action')</th>
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
                            <form action="{{action('EmployeeController@edit', $employee->id)}}" method="get">
                              @csrf
                              <input name="_method" type="hidden" value="put">
                              <button class="btn btn-warning" type="submit">@lang('ui.edit')</button>
                            </form>
                          </td>
                          <td>
                          <form action="{{action('EmployeeController@destroy', $employee->id)}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="delete">
                            <button class="btn btn-danger" type="submit">@lang('ui.delete')</button>
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
