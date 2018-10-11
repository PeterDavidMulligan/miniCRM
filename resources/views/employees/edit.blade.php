@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">

        <div class="card">
          <div class="card-header">@lang('edit_employee')</div>
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
                    <td><input type="text" class="form-control" value="{{$employee->first_name}}"></td>
                    <td><input type="text" class="form-control" value="{{$employee->last_name}}"></td>
                    <td><input type="number" step="1" min="1" value="{{$employee->company}}"></td>
                    <td><input type="text" class="form-control" value="{{$employee->email}}"></td>
                    <td><input type="text" class="form-control" value="{{$employee->phone}}"></td>
                  </tr>
                </tbody>
              </table>
              <div class="row justify-content-center">
                <form action="{{action('EmployeeController@edit', $employee->id)}}" method="put">
                  @csrf
                  <input name="_method" type="hidden" value="post">
                  <button class="btn btn-warning" type="submit">@lang('ui.edit')</button>
                </form>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
