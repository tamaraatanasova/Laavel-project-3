<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageControler extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('homepage', compact('projects'));   
    }
}
