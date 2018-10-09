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

                    <!-- Hack to make seeded image urls work -->
                    <?php if (strpos($company->logo, 'lorem') !== false): ?>
                      <td>{{ Html::image($company->logo) }}</td>
                    <?php else: ?>
                      <td>{{ Html::image( URL::to('/') . '/logos/' . $company->logo) }}</td>
                    <?php endif; ?>

                    <td>{{$company->website}}</td>
                  </tr>
                </tbody>
              </table>
              <div class="row">
                <form enctype="multipart/form-data" name ="editCompanyForm" action="{{action('CompanyController@edit', $company->id)}}" method="post">
                    <input type="text" class="form-control col-lg-2" name="name" value="{{$company->name}}">
                    <input type="text" class="form-control col-lg-2" name="email" value="{{$company->email}}">
                    <input type="file" class="form-control col-lg-2" name="logo"/>
                    <input type="text" class="form-control col-lg-6" name="website" value="{{$company->website}}">
                    <br><br>
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
</div>
@endsection
