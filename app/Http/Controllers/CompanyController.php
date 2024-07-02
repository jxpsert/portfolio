<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.companies.index', [
            'companies' => Company::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:companies,name',
            'url' => 'required|url',
            'logo' => 'required|image|mimes:png',
        ]);

        $company = Company::create($request->all());

        // Get the logo file
        $logo = $request->file('logo');
        $logo->storeAs('public/assets/logos', $company->id . '.png');

        return redirect()->route('admin.companies.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('pages.admin.companies.edit', [
            'company' => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:companies,name,' . $company->id . ',id',
            'url' => 'required|url',
            'logo' => 'nullable|image|mimes:png',
        ]);

        $company->update($request->all());

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logo->storeAs('public/assets/logos', $company->id . '.png');
        }

        return redirect()->route('admin.companies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('admin.companies.index');
    }
}
