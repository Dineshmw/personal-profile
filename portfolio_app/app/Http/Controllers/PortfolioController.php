<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $skills = \App\Models\Skill::all();
        $projects = \App\Models\Project::all();
        
        return view('portfolio.index', compact('skills', 'projects'));
    }
}
