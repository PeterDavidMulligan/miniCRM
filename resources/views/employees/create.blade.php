@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Create Employee</div>

          <div class="card-body">
              @if (session('status'))
                  <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                  </div>
              @endif
              
              <table class="table">
                <thead>
                  <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Company ID</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="number" step="1" min="0"></td>
                    <td><input type="text" class="form-control"></td>
                    <td><input type="text" class="form-control"></td>
                  </tr>
                </tbody>
              </table>

              <div class="row justify-content-center">
                <form action="{{action('EmployeeController@store')}}" method="post">
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
