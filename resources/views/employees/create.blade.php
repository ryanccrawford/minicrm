@extends('layouts.dash')

@section('title', trans('employee.create'))

@section('content')
  <div class="page-header"><h3 class="text-dark">{{ trans('employee.create') }}</h3></div>

<div class="row">

        <div class="card">
            <div class="card-body">
            {!! Form::open(['route' => 'employees.store']) !!}

                        {{-- FIRST NAME TEXT FIELD --}}
            <div class="form-group mb-2">
                <label for="first_name" class="text-dark">{{ trans('employee.first_name') }}</label>
                <input type="text" name="first_name" class="form-control" id="first_name" value="" required>
            </div>

            {{--  LAST NAME TEXT FIELD  --}}
            <div class="form-group mb-2">
                <label for="last_name" class="text-dark">{{ trans('employee.last_name') }}</label>
                <input type="text" name="last_name" class="form-control" id="last_name" value="" required>
            </div>

            {{-- COMPANY SELECT BOX --}}
            <div class="form-group mb-2">
                 <label for="company_id" class="text-dark">{{ trans('employee.company') }}</label>

            <select name="company_id" class="custom-select" placeholder="Select Company..." required>
                <option selected>Select a company...</option>
                @for ($i = 0; $i < 10; $i++)
                    <option value="{{$i+1}}" {{ $selectedId == $i+1 ? 'selected' : ''}}>{{ $companyList[$i+1] }}</option>
                @endfor
            </select>
            </div>

            {{--  EMAIL TEXT FIELD  --}}
            <div class="form-group mb-2">
                <label for="email" class="text-dark">{{ trans('employee.email') }}</label>
                <input type="email" name="email" class="form-control" id="email" value="" placeholder="email@domain.com">
            </div>

            {{-- PHONE TEXT FIELD --}}
            <div class="form-group mb-2">
                <label for="phone" class="text-dark">{{ trans('employee.phone') }}</label>
                <input type="tel" name="phone" class="form-control" id="phone" value="" placeholder="(123) 555-1234">
            </div>
            <div class="card-action">
                {!! Form::submit(trans('employee.create'), ['class' => 'btn btn-success']) !!}
                {{ link_to_route('employees.index', trans('app.cancel'), [], ['class' => 'btn btn-default']) }}
            </div>
            {!! Form::close() !!}
        </div>

    </div>
</div>
@endsection
