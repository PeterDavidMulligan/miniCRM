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

              <table class="table">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Logo</th>
                    <th>Website</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="file"/></td>
                    <td><input type="text" class="form-control"></td>
                  </tr>
                </tbody>
              </table>

              <div class="row justify-content-center">
                <form action="{{action('CompanyController@store')}}" method="post">
                  @csrf
                  <button class="btn btn-warning" type="submit">Create</button>
                </form>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
