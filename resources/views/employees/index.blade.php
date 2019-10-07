@extends('layouts.dash')

@section('title', trans('employee.list'))

@section('content')
<h1 class="page-header text-white">{{ trans('employee.list') }}</h1>
<div class="row">
    <div class="card">
         <div class="card-body">
             <div class="card-action">
                <div class="pull-right">
                    @can('create', new App\Employee)
                    <a class="btn btn-success" href="/employees/create" title="{{ trans('employee.create') }}">{{ trans('employee.create') }}</a>
                    @endcan
                </div>
            </div>
            <div class="table-responsive">
            <div>Page</div>
            <span class="float-left">{{ $employees->appends(Request::except('page'))->render() }}</span>
            <span class="float-right"><small>{{ trans('app.total') }} : {{ $employees->total() }}</small></span>
            </div>
            <table class="table table-condensed">

                <thead>
                    <tr>
                        <th class="text-center">{{ trans('app.table_no') }}</th>
                        <th>{{ trans('app.name') }}</th>
                        <th>{{ trans('employee.company') }}</th>
                        <th>{{ trans('employee.email') }}</th>
                        <th>{{ trans('employee.phone') }}</th>
                        <th class="text-center">{{ trans('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                     @foreach($employees as $key => $employee)
                    <tr>
                        <td class="text-center">{{ $employees->firstItem() + $key }}</td>
                        <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                        <td>{{ $employee->company->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td class="text-center">
                        @can('update', $employee)
                            {!! link_to_route(
                                'employees.edit',
                                trans('app.edit'),
                                [$employee],
                                ['id' => 'edit-employee-'.$employee->id]
                            ) !!}
                        @endcan
                        @can('delete', $employee)
                        |
                            {!! link_to_route(
                                'employees.destroy',
                                trans('app.delete'),
                                [$employee],
                                ['id' => 'del-employee-'. $employee->id]
                            ) !!}
                        @endcan
                        </td>
                    </tr>
                    @endforeach
                    <tr><td colspan="6">{{ $employees->appends(Request::except('page'))->render() }}<tr></tr>
                </tbody>
            </table>
         </div>

        </div>

    </div>
@endsection
