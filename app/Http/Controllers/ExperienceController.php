<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Category;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiences = Experience::orderByRaw('end IS NULL DESC')->orderBy('start', 'DESC')->orderBy('end', 'ASC')->get();
        return view('pages.admin.experiences.index', [
            'experiences' => $experiences
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.experiences.create', [
            'categories' => Category::pluck('name', 'id'),
            'companies' => Company::pluck('name', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:work,education',
            'title' => 'required|string|max:255',
            'company_id' => 'required|integer|exists:companies,id',
            'start' => 'required|date',
            'end' => 'nullable|date',
            'description' => 'required|string',
            'city' => 'required|string|max:255',
            'categories' => 'nullable|array'
        ]);

        $experience = Experience::create($request->all());

        // Attach the categories
        if($request->has('categories'))
            $experience->categories()->attach($request->categories);

        return redirect()->route('admin.experiences.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Experience $experience)
    {
        return view('pages.admin.experiences.edit', [
            'experience' => $experience,
            'categories' => Category::pluck('name', 'id'),
            'companies' => Company::pluck('name', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Experience $experience)
    {
        $request->validate([
            'type' => 'required|in:work,education',
            'title' => 'required|string|max:255',
            'company_id' => 'required|integer|exists:companies,id',
            'start' => 'required|date',
            'end' => 'nullable|date',
            'description' => 'required|string',
            'city' => 'required|string|max:255',
            'categories' => 'nullable|array'
        ]);

        $experience->update($request->all());

        // Sync the categories
        if($request->has('categories'))
            $experience->categories()->sync($request->categories);

        return redirect()->route('admin.experiences.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Experience $experience)
    {
        $experience->delete();

        return redirect()->route('admin.experiences.index');
    }
}