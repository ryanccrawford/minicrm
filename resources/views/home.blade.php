@extends('layouts.dash')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <h1 class="card-title">Dashboard</h1>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="aling-center">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Total Companies</h3>
                                <p>{!! $numberCompanies !!}<p>
                            </div>
                            <div class="col-md-6">
                                <h3>Total Employees</h3>
                                <p>{!! $numberEmployess !!}<p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
