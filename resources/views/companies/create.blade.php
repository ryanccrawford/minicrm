@extends('layouts.app')

@section('title', trans('company.create'))

@section('content')
<div class="row">
    <div class="container">
        <div class="col-md-6">
        <div class="card shadow">
                    <h3 class="card-title text-dark">{{ trans('company.create') }}</h3>

        <div class="card-body">
                @include('forms.create.company')
        </div>
        </div>
        </div>
    </div>
</div>
@endsection
