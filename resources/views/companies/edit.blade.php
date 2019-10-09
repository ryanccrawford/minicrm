@extends('layouts.dash')

@section('title', trans('company.edit'))

@section('content')

@if (request('action') == 'delete' && $company)
<div class="row">
    <div class="col-md-6">
        @can('delete', $company)
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">{{ trans('company.delete') }}</h3></div>
                <div class="panel-body">
                    <label class="control-label">{{ trans('company.name') }}</label>
                    <p>{{ $company->name }}</p>
                    <label class="control-label">{{ trans('company.email') }}</label>
                    <p>{{ $company->email }}</p>
                    <label class="control-label">{{ trans('company.website') }}</label>
                    <p>{{ $company->website }}</p>
                    {!! $errors->first('company_id', '<span class="form-error small">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body">{{ trans('app.delete_confirm') }}</div>
                <div class="card-action">
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
     <div class="row">
    <div class="card">
       <div class="card-body">
           <div class="row">
        <div class="col-md-6 ">
            <h3 class="text-dark">{{ trans('company.edit') }}</h3>
            {!! Form::open() !!}
            {!! Form::model($company, ['route' => ['companies.update', $company],'method' => 'patch']) !!}
            <div class="form-group mb-2">
                <label for="name" class="control-label">{{ trans('company.name') }}</label>
                {!! Form::text('name') !!}
            </div>
            <div class="form-group mb-2">
                <label for="email" class="control-label">{{ trans('company.email') }}</label>
                {!! Form::email('email') !!}
            </div>
            <div class="form-group mb-2">
                <label for="website" class="control-label">{{ trans('company.website') }}</label>
                {!! Form::url('website') !!}
            </div>
                {!! Form::submit(trans('company.update'), ['class' => 'btn btn-success']) !!}
                {{ link_to_route('companies.show', trans('app.cancel'), [$company], ['class' => 'btn btn-default ']) }}
                @can('delete', $company)
                    {{ link_to_route('companies.edit', trans('app.delete'), [$company, 'action' => 'delete'], ['class' => 'btn btn-danger pull-right', 'id' => 'del-company-'.$company->id]) }}
                @endcan
                {!! Form::close() !!}
        </div>
        <div class="col-md-6 p-4">
            <h3 class="text-dark">{{ trans('company.logo_upload') }}</h3>
                @if ($company->logo && is_file(public_path('storage/'.$company->logo)))
                {{ Html::image('storage/'.$company->logo, $company->name, ['style' => 'width:100%']) }}
                @endif
                {{ Form::open(['route' => ['companies.logo-upload', $company], 'method' => 'patch', 'files' => true]) }}
                <div class="form-group mb-2">
                    <label for="logo" class="control-label">{{ trans('company.logo') }}</label>
                    {!! Form::file('logo', ['label' => false]) !!}
                </div>
                {{ Form::submit(trans('company.upload_logo'), ['class' => 'btn btn-primary']) }}
                {{ Form::close() }}
            </div>
        </div>
        </div>
    </div>
</div>
    </div>
@endif
@endsection
