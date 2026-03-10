<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'project_url' => 'nullable|url',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('projects', 'public');
            $validated['image_url'] = '/storage/' . $path;
        }

        unset($validated['image']);

        Project::create($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.form', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'project_url' => 'nullable|url',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($project->image_url && str_starts_with($project->image_url, '/storage/')) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $project->image_url));
            }
            $path = $request->file('image')->store('projects', 'public');
            $validated['image_url'] = '/storage/' . $path;
        }

        unset($validated['image']);

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        if ($project->image_url && str_starts_with($project->image_url, '/storage/')) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $project->image_url));
        }
        $project->delete();
        return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
    }
}
