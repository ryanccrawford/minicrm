@extends('layouts.dash')

@section('title', trans('company.list'))

@section('content')
<h1 class="page-header text-white">{{ trans('company.list') }}</h1>
<div class="row">
    <div class="card col-md-12">
        <div class="card-body">
            <div class="card-action">
             <div class="pull-right">
                @can('create', new App\Company)
                    <a class="btn btn-success" href="/companies/create" title="{{ trans('company.create') }}">{{ trans('company.create') }}</a>
                @endcan
            </div>
        </div>

        <div class="table-responsive">
            <div>Page</div>
             <span class="float-left">{{ $companies->appends(Request::except('page'))->render() }}</span>
            <span class="float-right"><small>{{ trans('app.total') }} : {{ $companies->total() }}</small></span>
        </div>
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th class="text-center">{{ trans('app.table_no') }}</th>
                        <th>{{ trans('company.name') }}</th>
                        <th>Number of Employees</th>
                        <th class="text-center">{{ trans('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companies as $key => $company)
                    <tr>
                        <td class="text-center">{{ $companies->firstItem() + $key }}</td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->employees()->count() }}</td>
                        <td class="text-center">
                        @can('update', $company)
                            {!! link_to_route(
                                'companies.edit',
                                trans('app.edit'),
                                [$company],
                                ['id' => 'edit-company-'. $company->id]
                            ) !!}

                        @endcan
                        @can('view', $company)
                            |
                            {!! link_to_route(
                                'companies.show',
                                trans('app.show'),
                                [$company],
                                ['id' => 'show-company-' . $company->id]
                            ) !!}
                        @endcan
                        @can('delete', $company)
                        |
                            {!! link_to_route(
                                'companies.destroy',
                                trans('app.delete'),
                                [$company],
                                ['id' => 'del-company-'. $company->id]
                            ) !!}
                        @endcan
                    </td>
                    </tr>
                    @endforeach
                      <tr><td colspan="6">{{ $companies->appends(Request::except('page'))->render() }}<tr></tr>
                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection
