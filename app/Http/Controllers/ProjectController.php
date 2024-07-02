<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.admin.projects.index', [
            'projects' => Project::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.projects.create', [
            'categories' => Category::pluck('name', 'id')->toArray()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'required|string|max:255|unique:projects,slug',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'url' => 'nullable|url|max:255',
            'github' => 'nullable|url|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:png',
            'categories' => 'nullable|array',
        ]);

        // make the slug web-safe
        $request->merge([
            'slug' => Str::slug($request->slug)
        ]);

        $project = Project::create($request->all());

        // Get the image file
        $image = $request->file('image');
        $image->storeAs('public/assets/projects', $project->id . '.png');

        return redirect()->route('admin.projects.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('pages.admin.projects.edit', [
            'project' => $project,
            'categories' => Category::pluck('name', 'id')->toArray()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'slug' => 'required|string|max:255|unique:projects,slug',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'url' => 'nullable|url|max:255',
            'github' => 'nullable|url|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:png',
            'categories' => 'nullable|array',
        ]);

        $request->merge([
            'slug' => Str::slug($request->slug)
        ]);

        $project->update($request->all());

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/assets/projects', $project->id . '.png');
        }

        return redirect()->route('admin.projects.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}