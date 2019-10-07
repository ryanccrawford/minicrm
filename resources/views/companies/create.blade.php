@extends('layouts.app')

@section('title', trans('company.create'))

@section('content')
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="card">
            <div class="card-title"><h3 class="text-dark">{{ trans('company.create') }}</h3></div>
            {!! Form::open(['route' => 'companies.store']) !!}
            <div class="card-body">
                {{-- NAME TEXT FIELD --}}
                <div class="form-group mb-2">
                <label for="name" class="text-dark">{{ trans('company.name') }}</label>
                <input type="text" name="name" class="form-control" id="name" value="" required>
                </div>

                {{--  EMAIL TEXT FIELD  --}}
                <div class="form-group mb-2">
                <label for="email" class="text-dark">{{ trans('company.email') }}</label>
                <input type="email" name="email" class="form-control" id="email" value="" required>
                </div>

                {{-- WEBSITE TEXT FIELD  --}}
                <div class="form-group mb-2">
                <label for="website" class="text-dark">{{ trans('company.website') }}</label>
                <input type="url" name="website" class="form-control" id="website" value="">
                </div>
            </div>
            <div class="card-footer">
                {!! Form::submit(trans('company.create'), ['class' => 'btn btn-success']) !!}
                {{ link_to_route('companies.index', trans('app.cancel'), [], ['class' => 'btn btn-default']) }}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
