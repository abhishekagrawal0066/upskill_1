<?php

namespace App\Http\Controllers\AdminAuth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function perform()
    {
        Session::flush();
        Auth::logout();
        return redirect('admin/login');
    }
}
