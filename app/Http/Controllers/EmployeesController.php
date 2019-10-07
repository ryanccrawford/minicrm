<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use App\Http\Requests\EmployeeCreateRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $editableEmployee = null;
        $companyList = Company::pluck('name', 'id');

        $employeeQuery = Employee::where(function ($query) {
            $searchQuery = request('q');
            $query->where('first_name', 'like', '%' . $searchQuery . '%');
            $query->orWhere('last_name', 'like', '%' . $searchQuery . '%');
        });
        $selectedId = 0;
        if ($companyId = request('company_id')) {
            $employeeQuery->where('company_id', $companyId);
            $selectedId = $companyId;
        }

        $employees = $employeeQuery->with('company')->paginate();

        if (in_array(request('action'), ['edit', 'delete']) && request('id') != null) {
            $editableEmployee = Employee::find(request('id'));
        }

        return view('employees.index', compact('employees', 'editableEmployee', 'selectedId', 'companyList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', new Employee);
        $selectedId = 0;
        $companyList = Company::pluck('name', 'id')->all();
        return view('employees.create', compact('companyList', 'selectedId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\EmployeeCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeCreateRequest $request)
    {
        $newEmployee = $request->validated();
        $newEmployee['user_id'] = auth()->id();

        Employee::create($newEmployee);

        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {

        $company = $employee->company();
        if (request('q')) {
            $searchQuery = request('q');
            $employees = $company->employees()->where(function ($query) {
                $query->where('first_name', 'like', '%' . request('q') . '%');
                $query->orWhere('last_name', 'like', '%' . request('q') . '%');
            })->paginate();
        }
        return view('employees.show', compact('company', 'employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\EmployeeUpdateRequest $request
     * @param \App\Employee                            $employee
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeUpdateRequest $request, Employee $employee)
    {
        $this->authorize('update', $employee);

        $employeeData = $request->validated();
        $employee->update($employeeData);

        $routeParam = request()->only('page', 'q');

        return redirect()->route('employees.index', $routeParam);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $this->authorize('delete', $employee);

        $this->validate(request(), [
            'employee_id' => 'required',
        ]);

        $routeParam = request()->only('page', 'q');

        if (request('employee_id') == $employee->id && $employee->delete()) {
            return redirect()->route('employees.index', $routeParam);
        }

        return back();
    }
}
