@extends('layouts.app')

@section('content')
<div class="container">
  <div class="d-flex flex-container justify-content-center">
    <div class="col-md-12">

      <div class="card">
        <div class="card-header">@lang('ui.edit_company')</div>
        <div class="card-body">

        @if (session('status'))
        <div class="alert alert-success" role="alert">
        {{ session('status') }}
        </div>
        @endif


        @if (count($errors) > 0)
        <div class = "alert alert-danger">
          <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
          </ul>
        </div>
        @endif


        <div class="d-flex flex-container  justify-content-center">
          <div class="d-flex flex-row justify-content-center">
              <form enctype="multipart/form-data" name ="editCompanyForm" action="{{action('CompanyController@edit', $company->id)}}" method="post">
                  @lang('ui.name')<br>
                  <input type="text" class="form-control" name="name" value="{{$company->name}}">
                  @lang('ui.email')<br>
                  <input type="text" class="form-control" name="email" value="{{$company->email}}">
                  @lang('ui.logo')<br>
                  <input type="file" class="form-control" name="logo"/>
                  @lang('ui.website')<br>
                  <input type="text" class="form-control" name="website" value="{{$company->website}}">
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
