<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Experience;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function home()
    {
        $workExperiences = Experience::where('type', 'work')->orderByRaw('end IS NULL DESC')->orderBy('end', 'DESC')->get();
        $educationExperiences = Experience::where('type', 'education')->orderByRaw('end IS NULL DESC')->orderBy('end', 'DESC')->get();

        return view('pages.home', [
            'workExperiences' => $workExperiences,
            'educationExperiences' => $educationExperiences,
            'projects' => Project::all()
        ]);
    }

    public function project(Project $project)
    {

        $relatedProjects = Project::where('id', '!=', $project->id)->get()->random(3);
        $categories = $project->categories->pluck('name')->toArray();

        return view('pages.project', [
            'project' => $project,
            'relatedProjects' => $relatedProjects,
            'categories' => $categories
        ]);
    }

    public function links()
    {
        return view('pages.links');
    }
}