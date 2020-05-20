<?php

namespace App\Http\Controllers;

use App\Company;
use App\CompanyStatus;
use App\CompanyType;
use App\Http\Requests\CreateCompany;
use App\Http\Requests\UpdateCompany;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('companies.index', compact(['companies']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = new Company;
        $companyTypes = CompanyType::pluck('name', 'id');
        $companyStatuses = CompanyStatus::pluck('name', 'id');
        return view('companies.create', compact(['company', 'companyTypes', 'companyStatuses']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCompany $request)
    {
        Company::create($request->all());
        return redirect('companies')->with('alert', 'Company created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $companyTypes = CompanyType::pluck('name', 'id');
        $companyStatuses = CompanyStatus::pluck('name', 'id');
        return view('companies.edit', compact(['company', 'companyTypes', 'companyStatuses']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompany $request, Company $company)
    {
        $company->update($request->all());
        return redirect('companies')->with('alert', 'Company updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
