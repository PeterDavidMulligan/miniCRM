@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Companies</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Logo</th>
                          <th>Website</th>
                          <th colspan="2">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($companies as $company)
                        <tr>
                          <td>{{ $company->id }}</td>
                          <td>{{ $company->name }}</td>
                          <td>{{ $company->email }}</td>
                          <td>{{ $company->logo }}</td>
                          <td>{{ $company->website }}</td>

                          <td><a href="{{action('CompanyController@edit', $company['id'])}}" class="btn btn-warning">Edit</a></td>
                          <td>
                            <form action="{{action('CompanyController@destroy', $company['id'])}}" method="post">
                            @csrf
                              <input name="_method" type="hidden" value="DELETE">
                              <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    {{ $companies->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
