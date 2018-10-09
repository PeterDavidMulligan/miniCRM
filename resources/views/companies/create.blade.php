@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Create Company</div>

          <div class="card-body">
              @if (session('status'))
                  <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                  </div>
              @endif
              <div class="row justify-content-center">
                  <form enctype="multipart/form-data" name ="createCompanyForm" action="{{url('/companies/create')}}" method="post">
                      <label class="row justify-content-center">Name</label><input type="text" name="name" class="form-control"/><br>
                      <label class="row justify-content-center">Email</label><input type="email" name="email" class="form-control"/><br>
                      <label class="row justify-content-center">Logo</label><input type="file" name="logo" class="form-control"/><br>
                      <label class="row justify-content-center">Website</label><input type="text" name="website" class="form-control"/><br>
                      <div class="row justify-content-center">
                          <button name="submit" class="btn btn-warning" type="submit" value="Submit">Create</button>
                      </div>
                      <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                  </form>
              </div>
              @if (count($errors) > 0)
              <div class = "alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
                </ul>
              </div>
              @endif
              </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
