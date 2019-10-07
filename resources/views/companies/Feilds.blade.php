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

{{ link_to_route('employees.destroy', 'Remove', ['employee_id' => $editableEmployee->id, 'page' => request('page'), 'q' => request('q')], ['class' => 'btn btn-primary btn-lg active']) }}

{{--  SEARCH TEXT FIELD  --}}
<div class="form-group mb-2">
    <label for="q" class="input-sm">{{ trans('company.search') }}</label>
<input type="text" name="q" class="form-control-plaintext" id="q" value="{{ request('q') }}">
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

{{--  SEARCH TEXT FIELD  --}}
<div class="form-group mb-2">
    <label for="q" class="input-sm">{{ trans('company.search') }}</label>
<input type="text" name="q" class="form-control-plaintext" id="q" value="{{ request('q') }}">
</div>








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



{{-- EMPLOYEE SEARCH TEXT FIELD  --}}
<div class="form-group mb-2">
    <label for="q" class="sr-only">{{ trans('employee.search') }}</label>
<input type="text" name="q" class="input-sm" id="q" value="{{ request('q') }}">
</div>
composer
