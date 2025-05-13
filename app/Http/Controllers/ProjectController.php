<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return response()->json($projects);
    }

    public function create()
    {
        return view('admin.dashboard');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|min:3',
            'subtitle' => 'nullable|string|max:255|min:3',
            'image' => 'nullable|string',
            'url' => 'nullable|url',
            'description' => 'nullable|string|min:20',
        ]);

        $project = Project::create($validated);
        return back()->with('success', 'Продуктот е успешно додаден');
    }

 
    public function editView()
    {
        $projects = Project::all();
        return view('admin.edit', compact('projects'));
    }



    public function edit($id)
    {
        $project = Project::find($id);
        if (!$project) {
            return response()->json(['error' => 'Project not found'], 404);
        }
        return response()->json($project);
    }
    

    public function update(Request $request, string $id)
    {
        // Find the project or fail
        $project = Project::findOrFail($id);
    
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'url' => 'nullable|url',
            'description' => 'nullable|string|min:20', // Ensure description is meaningful
        ]);
    
        // Update the project with the validated data
        $project->update($validated);

        return back()->with('success', 'Проектот е успешно изменет');
    }
    

    /**
     * Delete a project.
     *
     * @param string $id The ID of the project
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        // return response()->json(['message' => 'Project deleted successfully']);
        return back()->with('success', 'Проектот е успешно избришан');
    }
}
