@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">@lang('ui.create_employee')</div>

          <div class="card-body">

            <div class="container" name="headerContainer">
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

              <div class="row justify-content-center" name="bodyContainer">
                <form name ="createEmployeeForm" action="{{url('/employees/create')}}" method="post">
                  <label class="row justify-content-center">@lang('ui.first_name')</label>
                  <input type="text" name="first_name" class="form-control"/><br>

                  <label class="row justify-content-center">@lang('ui.last_name')</label>
                  <input type="text" name="last_name" class="form-control"/><br>

                  <label class="row justify-content-center">@lang('ui.company')
                  </label><input type="number" name="company" class="form-control" min="1" value="1" /><br>

                  <label class="row justify-content-center">@lang('ui.email')</label>
                  <input type="email" name="email" class="form-control"/><br>

                  <label class="row justify-content-center">@lang('ui.phone')
                  </label><input type="text" name="phone" class="form-control"/><br>

                  <div class="row justify-content-center">
                    <button name="submit" class="btn btn-warning" type="submit" value="Submit">@lang('ui.create')</button>
                  </div>
                  <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                </form>
              </div>
            </div>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection
