@if (Request::get('action') == 'create')
@can('create', new App\Employee)
    {!! Form::open(['route' => 'employees.store']) !!}
        {{-- FIRST NAME TEXT FIELD --}}
        <div class="form-group mb-2">
            <label for="first_name" class="sr-only">{{ trans('employee.first_name') }}</label>
            <input type="text" name="last_name" class="form-control-plaintext" id="first_name" value="" required>
        </div>

        {{--  LAST NAME TEXT FIELD  --}}
        <div class="form-group mb-2">
            <label for="last_name" class="sr-only">{{ trans('employee.last_name') }}</label>
            <input type="text" name="last_name" class="form-control-plaintext" id="first_name" value="" required>
        </div>

        {{-- COMPANY SELECT BOX --}}
        <div class="form-group mb-2">
        <select name="company_id" class="custom-select" required>
        <option selected>Select Company</option>
            @foreach($companyList as $key => $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
            @endforeach
        </select>
        </div>

        {{--  EMAIL TEXT FIELD  --}}
        <div class="form-group mb-2">
            <label for="email" class="sr-only">{{ trans('employee.email') }}</label>
            <input type="email" name="email" class="form-control-plaintext" id="email" value="">
        </div>

        {{-- PHONE TEXT FIELD --}}
        <div class="form-group mb-2">
            <label for="phone" class="sr-only">{{ trans('employee.phone') }}</label>
            <input type="tel" name="phone" class="form-control-plaintext" id="phone" value="">
        </div>

    {!! Form::submit(trans('employee.create'), ['class' => 'btn btn-success']) !!}
    {{ link_to_route('employees.index', trans('app.cancel'), [], ['class' => 'btn btn-default']) }}
    {!! Form::close() !!}
@endcan
@endif
@if (Request::get('action') == 'edit' && $editableEmployee)
@can('update', $editableEmployee)
    {!! Form::model($editableEmployee, ['route' => ['employees.update', $editableEmployee],'method' => 'patch']) !!}
    {{-- FIRST NAME TEXT FIELD --}}
<div class="form-group mb-2">
    <label for="first_name" class="sr-only">{{ trans('employee.first_name') }}</label>
    <input type="text" name="last_name" class="form-control-plaintext" id="first_name" value="" required>
</div>

{{--  LAST NAME TEXT FIELD  --}}
<div class="form-group mb-2">
    <label for="last_name" class="sr-only">{{ trans('employee.last_name') }}</label>
    <input type="text" name="last_name" class="form-control-plaintext" id="first_name" value="" required>
</div>

{{-- COMPANY SELECT BOX --}}
<div class="form-group mb-2">
<select name="company_id" class="custom-select" required>
  <option selected>Select Company</option>
    @foreach($companyList as $key => $company)
              <option value="{{ $company->id }}">{{ $company->name }}</option>
    @endforeach
</select>
</div>

{{--  EMAIL TEXT FIELD  --}}
<div class="form-group mb-2">
    <label for="email" class="sr-only">{{ trans('employee.email') }}</label>
    <input type="email" name="email" class="form-control-plaintext" id="email" value="">
</div>

{{-- PHONE TEXT FIELD --}}
<div class="form-group mb-2">
    <label for="phone" class="sr-only">{{ trans('employee.phone') }}</label>
    <input type="tel" name="phone" class="form-control-plaintext" id="phone" value="">
</div>
    @if (request('q'))
        {{ Form::hidden('q', request('q')) }}
    @endif
    @if (request('page'))
        {{ Form::hidden('page', request('page')) }}
    @endif
    {!! Form::submit(trans('employee.update'), ['class' => 'btn btn-success']) !!}
    {{ link_to_route('employees.index', trans('app.cancel'), [], ['class' => 'btn btn-default']) }}
    {!! Form::close() !!}
@endcan
@endif
@if (Request::get('action') == 'delete' && $editableEmployee)
@can('delete', $editableEmployee)
    <div class="panel panel-default">
        <div class="panel-heading"><h3 class="panel-title">{{ trans('employee.delete') }}</h3></div>
        <div class="panel-body">
            <label class="control-label">{{ trans('app.name') }}</label>
            <p>{{ $editableEmployee->first_name }} {{ $editableEmployee->last_name }}</p>
            <label class="control-label">{{ trans('employee.company') }}</label>
            <p>{{ $editableEmployee->company->name }}</p>
            <label class="control-label">{{ trans('employee.email') }}</label>
            <p>{{ $editableEmployee->email }}</p>
            <label class="control-label">{{ trans('employee.phone') }}</label>
            <p>{{ $editableEmployee->phone }}</p>
            {!! $errors->first('employee_id', '<span class="form-error small">:message</span>') !!}
        </div>
        <hr style="margin:0">
        <div class="panel-body">{{ trans('app.delete_confirm') }}</div>
        <div class="panel-footer">
            {{ link_to_route('employees.destroy', 'Remove', ['employee_id' => $editableEmployee->id, 'page' => request('page'), 'q' => request('q')], ['class' => 'btn btn-primary btn-lg active']) }}

            {{ link_to_route('employees.index', trans('app.cancel'), [], ['class' => 'btn btn-default']) }}
        </div>
    </div>
@endcan
@endif
