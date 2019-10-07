@extends('layouts.app')

@section('title', trans('employee.detail'))

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-title"><h3 class="h3">{{ trans('employee.detail') }}</h3></div>
            <table class="table table-condensed">
                <tbody>
                    <tr>
                        <td class="col-xs-4">{{ trans('employee.first') }}</td>
                        <td>{{ $employee->first_name }}</td>
                    </tr>
                    <tr>
                        <td class="col-xs-4">{{ trans('employee.last') }}</td>
                        <td>{{ $employee->last_name }}</td>
                    </tr>
                    @if ($employee->email)
                    <tr>
                        <td>{{ trans('employee.email') }}</td>
                        <td>{{ $employee->email }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('employee.phone') }}</td>
                        <td>{{ $employee->phone }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="card-footer">
                @can('update', $company)
                    {{ link_to_route('companies.edit', trans('company.edit'), [$company], ['class' => 'btn btn-warning', 'id' => 'edit-company-'.$company->id]) }}
                @endcan
                {{ link_to_route('companies.index', trans('company.back_to_index'), [], ['class' => 'btn btn-default']) }}
            </div>
        </div>
    </div>
    <div class="col-md-8">
        @if(Request::has('action'))
        @include('employees.forms')
        @endif
        <div class="card">
            <div class="card-title">
                {{ Form::open(['method' => 'get','class' => 'form-inline pull-right']) }}
                {{-- EMPLOYEE SEARCH TEXT FIELD  --}}
                <div class="form-group mb-2">
                    <label for="q" class="sr-only">{{ trans('employee.search') }}</label>
                <input type="text" name="q" class="input-sm" id="q" value="{{ request('q') }}">
                </div>
                {{ Form::submit(trans('app.search'), ['class' => 'btn btn-sm']) }}
                {{ link_to_route('companies.show', trans('app.reset'), [$company]) }}
                {{ Form::close() }}
                <h3 class="title" style="margin: 6px 0px;">{{ trans('company.employees') }}</h3>
            </div>
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
            <div class="card-body">{{ $employees->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
</div>
@endsection
