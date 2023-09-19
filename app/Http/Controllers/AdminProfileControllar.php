<?php

namespace App\Http\Controllers;
use App\Admin;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AdminProfileControllar extends Controller
{
    public function edit(Request $request)
    {
        // $Companies = Companies::find($id);
        // return view('admin.profile.edit', [
        //     'admin' => $request->admin(),
        // ]);
        return view('admin.profile.edit');

    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request)
    {
        dd($request);
        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'updated_at' => now()
        ]);
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('adminprofile.edit')->with('status', 'profile-updated');
    }
}
