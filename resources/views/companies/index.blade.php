@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Companies</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{url('companies/create')}}">
                      @csrf
                      <button class="btn btn-warning" type="submit">Create New</button>
                    </form>

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

                          <!-- Hack to make seeded image urls work -->
                          <?php if (strpos($company->logo, 'lorem') !== false): ?>
                            <td>{{ Html::image($company->logo) }}</td>
                          <?php else: ?>
                            <td>{{ Html::image( URL::to('/') . '/logos/' . $company->logo) }}</td>
                          <?php endif; ?>

                          <td><a href="{{url($company->website)}}">{{$company->website}}</a></td>
                          <td>
                            <form action="{{action('CompanyController@edit', $company->id)}}" method="post">
                              @csrf
                              <input name="_method" type="hidden" value="put">
                              <button class="btn btn-warning" type="submit">Edit</button>
                            </form>
                          </td>
                          <td>
                            <form action="{{action('CompanyController@destroy', $company->id)}}" method="post">
                              @csrf
                              <input name="_method" type="hidden" value="delete">
                              <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                    </tbody>

                  </table>
                  <ul class="pagination pagination-lg justify-content-center">
                  {{ $companies->links() }}
                  </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
