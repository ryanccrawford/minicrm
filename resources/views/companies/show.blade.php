@extends('layouts.dash')

@section('title', trans('company.detail'))

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
          <h3>{{ trans('company.detail') }}</h3>
            @if ($company->logo && is_file(public_path('storage/'.$company->logo)))
                <div class="card-image">
                    {{ Html::image('storage/'.$company->logo, $company->name, ['style' => 'width:100%']) }}
                </div>
            @endif
            <table class="table table-condensed">
                <tbody>
                    <tr>
                        <td>{{ trans('company.name') }}</td>
                        <td>{{ $company->name }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('company.email') }}</td>
                        <td>{{ $company->email }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('company.website') }}</td>
                        <td>{{ $company->website }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="card-action">
                @can('update', $company)
                    {{ link_to_route('companies.edit', trans('company.edit'), [$company], ['class' => 'btn btn-warning', 'id' => 'edit-company-'.$company->id]) }}
                @endcan
                {{ link_to_route('companies.index', trans('company.back_to_index'), [], ['class' => 'btn btn-default']) }}
            </div>
        </div>
    </div>
</div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
            <h3 class="card-title">{{ trans('company.employees') }}</h3>
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th class="text-center">{{ trans('app.table_no') }}</th>
                        <th>{{ trans('app.name') }}</th>
                        <th>{{ trans('employee.email') }}</th>
                        <th>{{ trans('employee.phone') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $key => $employee)
                    <tr>
                        <td class="text-center">{{ $employees->firstItem() + $key }}</td>
                        <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phone }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $employees->appends(Request::except('page'))->render() }}
        </div>
    </div>
</div>
</div>
@endsection
