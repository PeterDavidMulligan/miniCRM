@extends('layouts.app')

@section('content')
<div class="container">
  <div class="d-flex flex-container justify-content-center">
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

          <div class="d-flex flex-container  justify-content-center">
            <div class="d-flex flex-row justify-content-center">
                <form enctype="multipart/form-data" name ="editEmployeeForm" action="{{action('EmployeeController@edit', $employee->id)}}" method="post">
                    @lang('ui.first_name')<br>
                    <input type="text" class="form-control" name="first_name" value="{{$employee->first_name}}">
                    @lang('ui.last_name')<br>
                    <input type="text" class="form-control" name="last_name" value="{{$employee->last_name}}">
                    @lang('ui.company')<br>
                    <input type="number" class="form-control" name="company" value="{{$employee->company}}" min="1" step="1" />
                    @lang('ui.email')<br>
                    <input type="text" class="form-control" name="email" value="{{$employee->email}}">
                    @lang('ui.phone')<br>
                    <input type="text" class="form-control" name="phone" value="{{$employee->phone}}">
                    <br><br>
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
</div>
@endsection
