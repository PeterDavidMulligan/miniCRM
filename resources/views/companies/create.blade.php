@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">@lang('ui.create_company')</div>

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

              <div class="row justify-content-center">
                <form enctype="multipart/form-data" name ="createCompanyForm" action="{{url('/companies/create')}}" method="post">
                  <label class="row justify-content-center">@lang('ui.name')</label><input type="text" name="name" class="form-control"/><br>
                  <label class="row justify-content-center">@lang('ui.email')</label><input type="email" name="email" class="form-control"/><br>
                  <label class="row justify-content-center">@lang('ui.logo')</label><input type="file" name="logo" class="form-control"/><br>
                  <label class="row justify-content-center">@lang('ui.website')</label><input type="text" name="website" class="form-control"/><br>
                  <div class="row justify-content-center">
                    <button name="submit" class="btn btn-warning" type="submit" value="Submit">Create</button>
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
