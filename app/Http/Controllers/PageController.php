<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Experience;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home', [
            'workExperiences' => Experience::where('type', 'work')->orderBy('start', 'DESC')->orderBy('end', 'ASC')->get(),
            'educationExperiences' => Experience::where('type', 'education')->orderBy('start', 'DESC')->orderBy('end', 'ASC')->get(),
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
}
