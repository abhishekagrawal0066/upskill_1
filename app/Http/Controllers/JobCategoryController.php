<?php

namespace App\Http\Controllers;
use App\Models\jobCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class JobCategoryController extends Controller
{
    public function index()
    {
        $jobcategory = jobCategory::all();
        
        return view('admin.job.list', compact('jobcategory'));
    }
    public function create()
    {
        return view('admin.job.add');
    }
}
