{{--

    Create new company blade form

    --}}

{!! Form::open(['route' => 'companies.store']) !!}

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Company Name</span>
  </div>
  {!! Form::text('name', "", ['class' => 'form-control','aria-label' => 'name', 'aria-describedby' => 'basic-addon1']); !!}
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon2">Company Email</span>
  </div>
  {!! Form::email('email', "", ['class' => 'form-control','aria-label' => 'email', 'aria-describedby' => 'basic-addon2']); !!}
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon3">Company website</span>
  </div>
  {!! Form::text('website', "", ['class' => 'form-control','aria-label' => 'website', 'aria-describedby' => 'basic-addon3']); !!}
</div>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="manger">Give Access to</label>
  </div>
  {!! Form::select('manager_id', $managersList, null, ['placeholder' => 'Select a Manager...']); !!}
</div>

{!! Form::submit(trans('company.create'), ['class' => 'btn btn-success']) !!}

{{ link_to_route('companies.index', trans('app.cancel'), [], ['class' => 'btn btn-outline-warning']) }}

{!! Form::close() !!}
