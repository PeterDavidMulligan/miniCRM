@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Edit Company</div>

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
                    <td>{{$company->name}}</td>
                    <td>{{$company->email}}</td>
                    <td>{{ Html::image($company->logo) }}</td>
                    <td>{{$company->website}}</td>
                  </tr>

                  <tr>
                    <td><input type="text" class="form-control" name="name" value="{{$company->name}}"></td>
                    <td><input type="text" class="form-control" name="name" value="{{$company->email}}"></td>
                    <td><input type="file"/></td>
                    <td><input type="text" class="form-control" name="name" value="{{$company->website}}"></td>
                  </tr>
                </tbody>
              </table>
              <div class="row justify-content-center">
                <form action="{{action('CompanyController@edit', $company->id)}}" method="post">
                  @csrf
                  <input name="_method" type="hidden" value="put">
                  <button class="btn btn-warning" type="submit">Edit</button>
                </form>
              </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
