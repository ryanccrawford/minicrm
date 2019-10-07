<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use App\Charts\numberOfCompanies;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $numberCompanies = Company::all()->count();
        $numberEmployess = Employee::all()->count();
        return view('/home', compact('numberCompanies', 'numberEmployess'));
    }
}
