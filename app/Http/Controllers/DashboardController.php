<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Project;
use App\Models\Experience;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.admin.dashboard', [
            'experiences' => Experience::count(),
            'projects' => Project::count(),
            'companies' => Company::count(),
            'categories' => Category::count(),
        ]);
    }
}