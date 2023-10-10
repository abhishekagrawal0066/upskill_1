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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jobcategory' => 'required|unique:jobCategory',
            'status' => 'required',
        ]);
        $jobCategory = jobCategory::create($validatedData);
        return back()->with('success', ' Job Category created successfully.');

    }
    public function edit($id)
    {
        $jobcategory = jobCategory::find($id);
        return view('admin.job.edit',compact('jobcategory'));
    }
    public function update(Request $request, jobCategory $id)
    {
        $validatedData = $request->validate([
            'jobcategory' => 'required',
            'status' => 'required',
        ]);
        $postData = ['jobcategory' => $request->jobcategory,'status' => $request->status];
        $id->update($postData);
        return redirect()->route('job.list')->with('success','Job Category name updated successfully');
    }
    public function destroy($id)
    {
        $post = jobCategory::find($id);
        $post->delete();
        return redirect()->route('job.list')->with('success','Job Category deleted successfully');
    }
    public function changeStatus(Request $request)
    {
        $jobcategory = jobCategory::find($request->user_id);
        // $Companies_id['status'] = $request->status;
        // // $id->update($Companies_status);
        // $Companies_id->update($Companies_id);
        $jobcategory->status = $request->status;
        $jobcategory->save();
        return response()->json(['success'=>'Status change successfully.']);
    }
}
