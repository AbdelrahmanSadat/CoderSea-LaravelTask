<?php

namespace App\Http\Controllers;

use App\Company;
use App\Mail\NewCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // TODO: create view
        return Company::paginate(10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('company.form', ['action' => '/companies', 'method' => 'POST']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'logo' => 'dimensions:min_width=100,min_height=100',
        ]);

        $path = $request->file('logo')->store('public');
        $company = new Company();
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->logo = $path;
        $company->save();
        Mail::to(env('MAIL_TO'))->send(new NewCompany($company));
        return 'Company Added Successfully';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        // TODO: create view
        return $company;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
        return view('company.form', [
            'action' => '/companies/' . $company->id,
            'method' => 'PUT',
            'name' => $company->name,
            'email' => $company->email
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->save();
        return 'Company Updated Successfully';
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
        return $company->delete();
    }
}
