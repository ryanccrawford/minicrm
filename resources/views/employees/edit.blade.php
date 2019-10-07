@extends('layouts.dash')

@section('title', trans('employee.edit'))

@section('content')

@if (request('action') == 'delete' && $employee)
<div class="row">
    <div class="col-md-6">
        @can('delete', $employee)
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">{{ trans('employee.delete') }}</h3></div>
                <div class="panel-body">
                    <label class="control-label">{{ trans('employee.first_name') }}</label>
                    <p>{{ $employee->first_name }}</p>
                     <label class="control-label">{{ trans('employee.last_name') }}</label>
                    <p>{{ $employee->last_name }}</p>
                    <label class="control-label">{{ trans('employee.email') }}</label>
                    <p>{{ $employee->email }}</p>
                    <label class="control-label">{{ trans('company.name') }}</label>
                    <p>{{ $employee->company()->name }}</p>
                    {!! $errors->first('company_id', '<span class="form-error small">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="panel-body">{{ trans('app.delete_confirm') }}</div>
                <div class="panel-footer">
                    {!! Form::submit(
                        ['route' => ['companies.destroy', $company]],
                        trans('app.delete_confirm_button'),
                        ['class'=>'btn btn-danger'],
                        [
                            'company_id' => $company->id,
                            'page' => request('page'),
                            'q' => request('q'),
                        ]
                    ) !!}
                    {{ link_to_route('companies.edit', trans('app.cancel'), [$company], ['class' => 'btn btn-default']) }}
                </div>
            </div>
        @endcan
    </div>
</div>
@else
<div class="container">
    <div class="col">
        <div class="card">
            <div class="panel-heading"><h3 class="panel-title">{{ trans('company.edit') }}</h3></div>
            <div class="panel-body">
               {!! Form::model($company, ['route' => ['companies.update', $company],'method' => 'patch']) !!}
                {{-- NAME TEXT FIELD --}}
<div class="form-group mb-2">
    <label for="name" class="sr-only">{{ trans('company.name') }}</label>
    <input type="text" name="name" class="form-control-plaintext" id="name" value="" required>
</div>

{{--  EMAIL TEXT FIELD  --}}
<div class="form-group mb-2">
    <label for="email" class="sr-only">{{ trans('company.email') }}</label>
    <input type="email" name="email" class="form-control-plaintext" id="email" value="" required>
</div>

{{-- WEBSITE TEXT FIELD  --}}
<div class="form-group mb-2">
    <label for="website" class="sr-only">{{ trans('company.website') }}</label>
    <input type="url" name="website" class="form-control-plaintext" id="website" value="">
</div>

            </div>
            <div class="panel-footer">
                {!! Form::submit(trans('company.update'), ['class' => 'btn btn-success']) !!}
                {{ link_to_route('companies.show', trans('app.cancel'), [$company], ['class' => 'btn btn-default']) }}
                @can('delete', $company)
                    {{ link_to_route('companies.edit', trans('app.delete'), [$company, 'action' => 'delete'], ['class' => 'btn btn-danger pull-right', 'id' => 'del-company-'.$company->id]) }}
                @endcan
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">{{ trans('company.logo_upload') }}</h3></div>
            <div class="panel-body">
                @if ($company->logo && is_file(public_path('storage/'.$company->logo)))
                {{ Html::image('storage/'.$company->logo, $company->name, ['style' => 'width:100%']) }}
                @endif
                {{ Form::open(['route' => ['companies.logo-upload', $company], 'method' => 'patch', 'files' => true]) }}
                {!! Form::file('logo', ['label' => false]) !!}
                {{ Form::submit(trans('company.upload_logo'), ['class' => 'btn btn-primary']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endif
@endsection
