@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Companies</div>

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

                  <div class="container" name="bodyContainer">
                    <form action="{{url('companies/create')}}">
                      @csrf
                      <button class="btn btn-warning" type="submit">@lang('ui.create_company')</button>
                    </form>

                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>@lang('ui.id')</th>
                          <th>@lang('ui.name')</th>
                          <th>@lang('ui.email')</th>
                          <th>@lang('ui.logo')</th>
                          <th>@lang('ui.website')</th>
                          <th colspan="2">@lang('ui.action')</th>
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($companies as $company)
                        <tr>
                          <td>{{ $company->id }}</td>
                          <td>{{ $company->name }}</td>
                          <td>{{ $company->email }}</td>

                          <!-- Hack to make displaying image work with both
                            public storage and external links -->
                          <?php if (strpos($company->logo, 'lorem') !== false): ?>
                            <td>{{ Html::image($company->logo) }}</td>
                          <?php else: ?>
                            <td>{{ Html::image( URL::to('/') . '/logos/' . $company->logo) }}</td>
                          <?php endif; ?>

                          <td>{{$company->website}}</td>
                          <td>
                            <form action="{{action('CompanyController@edit', $company->id)}}" method="get">
                              @csrf
                              <button class="btn btn-warning" type="submit">@lang('ui.edit')</button>
                            </form>
                          </td>
                          <td>
                            <form action="{{action('CompanyController@destroy', $company->id)}}" method="post">
                              @csrf
                              <input name="_method" type="hidden" value="delete">
                              <button class="btn btn-danger" type="submit">@lang('ui.delete')</button>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                    </tbody>

                  </table>

                </div>
                  <ul class="pagination pagination-lg justify-content-center">
                  {{ $companies->links() }}
                  </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
