@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">

        <div class="card">
          <div class="card-header">@lang('ui.edit_employee')</div>
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

              <table class="table">
                <thead>
                  <tr>
                    <th>@lang('ui.first_name')</th>
                    <th>@lang('ui.last_name')</th>
                    <th>@lang('ui.company_id')</th>
                    <th>@lang('ui.email')</th>
                    <th>@lang('ui.phone')</th>
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
                    <td><input name="first_name" type="text" class="form-control" value="{{$employee->first_name}}"></td>
                    <td><input name="last_name" type="text" class="form-control" value="{{$employee->last_name}}"></td>
                    <td><input name="company" type="number" step="1" min="1" default="1" value="{{$employee->company}}"></td>
                    <td><input name="email" type="text" class="form-control" value="{{$employee->email}}"></td>
                    <td><input name="phone" type="text" class="form-control" value="{{$employee->phone}}"></td>
                  </tr>
                </tbody>
              </table>
              <div class="row justify-content-center">
                <form action="{{action('EmployeeController@update', $employee->id)}}" method="post">
                  @csrf
                  <input name="_method" type="hidden" value="put">
                  <button class="btn btn-warning" type="submit">@lang('ui.edit')</button>
                </form>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
