<?php

namespace App\Http\Controllers;
use App\Models\jobCategory;
use App\Models\Companies;
use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Companies = Companies::all();
        return view('admin.companies.list', compact('Companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jobcategory = jobCategory::all();
        $countries = Country::get(["name","id"]);
        return view('admin.companies.add',compact('jobcategory','countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jobcategory' => 'required', 
            'companies_name' => 'required|unique:companies',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'salary' => 'required',
            'country' => 'required', 
            'state' => 'required', 
            'city' => 'required', 
            'time' => 'required', 
            'experience' => 'required',  
            'description' => 'required', 
            'status' => 'required',
        ]);
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $request->image->storeAs('public/images', $profileImage);
        }
        $validatedData['image'] = $profileImage;
        $companies = Companies::create($validatedData);
        return back()->with('success', 'Company name created successfully.');

    }
    // public function store(Request $request) {
    //     $request->validate([
    //     //   'title' => 'required',
    //     //   'category' => 'required',
    //     //   'content' => 'required|min:50',
    //       'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);
    //     $imageName = time() . '.' . $request->image->extension();
    //     //  $request->image->move(public_path('images'), $imageName);

    //     dd($request->image->storeAs('C:/xampp/htdocs/upskill_1/images/', $imageName));
    //     // $request->image->storeAs('C:\xampp\htdocs\upskill_1\images', $imageName);
    
    //     $postData = ['companies_name'=>'test','image' => $imageName];
    
    //     Companies::create($postData);
    //     return redirect('/admin/companies/add')->with(['message' => 'Post added successfully!', 'status' => 'success']);
    //   }

    /**
     * Display the specified resource.
     */
    public function show(Companies $companies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $companies = Companies::find($id);
        $jobcategory = jobCategory::all();
        $countries = Country::get(["name","id"]);
        return view('admin.companies.edit',compact('companies','jobcategory','countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Companies $id)
    {
        // $validatedData = $request->validate([
        //     'companies_name' => 'required|unique:companies'
        // ], [
        //     'companies_name.required' => 'Please enter the company name',
        //     'companies_name.unique' => 'Companies name is alredy taken.'
        // ]);
        // $companies = Companies::find($id);
        // $id->update($validatedData->all());
        $validatedData = $request->validate([
            'jobcategory' => 'required', 
            'companies_name' => 'required',
            'salary' => 'required',
            'country' => 'required', 
            'state' => 'required', 
            'city' => 'required', 
            'time' => 'required', 
            'experience' => 'required',  
            'description' => 'required', 
            'status' => 'required',
        ]);
        $imageName = '';
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $imageName);
            if ($id->image) {
              Storage::delete('public/images/' . $id->image);
            }
        } else {
            $imageName = $id->image;
        }
        $postData = ['jobcategory' => $request->jobcategory,'companies_name' => $request->companies_name,'image' => $imageName,'salary' => $request->salary,'country' => $request->country,'state' => $request->state,'city' => $request->city,'time' => $request->time,'experience' => $request->experience,'description' => $request->description,'status' => $request->status];
        $id->update($postData);
        return redirect()->route('companies.list')->with('success','Company name updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Companies $id)
    {
        Storage::delete('public/images/' . $id->image);
        $id->delete();
        return redirect()->route('companies.list')->with('success','Company deleted successfully');
    }
    public function changeStatus(Request $request)
    {
        $Companies = Companies::find($request->user_id);
        // $Companies_id['status'] = $request->status;
        // // $id->update($Companies_status);
        // $Companies_id->update($Companies_id);
        $Companies->status = $request->status;
        $Companies->save();

        return response()->json(['success'=>'Status change successfully.']);
    }
    public function userSite()
    {
        $Companies = Companies::all();
        $count = DB::table('companies')->count();
        return view('job_listing', compact('Companies','count'));
    }
    public function jobDetails($id)
    {
        $companies = Companies::find($id);
        // $Companies = Companies::all();
        return view('job_details', compact('companies'));
    }
}
