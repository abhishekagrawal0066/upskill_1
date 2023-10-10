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
    public function destroy(User $user) 
    {
        dd($user);
        $user->delete();
        return redirect()->route('user.list')->withSuccess(__('User deleted successfully.'));
    }
    
    public function restore(User $user) 
    {
        dd($user->id);
        User::where('id', $id)->withTrashed()->restore();
        return redirect()->route('user.list', ['status' => 'archived'])->withSuccess(__('User restored successfully.'));
    }
    public function forceDelete($id) 
    {
        dd($id);
        User::where('id', $id)->withTrashed()->forceDelete();
        return redirect()->route('user.list', ['status' => 'archived'])->withSuccess(__('User force deleted successfully.'));
    }
    public function restoreAll() 
    {
        User::onlyTrashed()->restore();
        return redirect()->route('user.list')->withSuccess(__('All users restored successfully.'));
    }
}
