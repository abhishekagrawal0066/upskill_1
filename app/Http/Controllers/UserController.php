<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $userAll = User::all();
        return view('admin.user.list',compact('userAll'));
    }
    // public function changeStatuse(Request $request)
    // {
    //     dd($request);
    //     $user = User::find($request->id);
    //     // $Companies_id['status'] = $request->status;
    //     // // $id->update($Companies_status);
    //     // $Companies_id->update($Companies_id);
    //     $user->status = $request->status;
    //     $user->save();

    //     return response()->json(['success'=>'Status change successfully.']);
    // }
}
