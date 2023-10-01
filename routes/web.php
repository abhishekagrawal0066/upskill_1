<?php
use App\Http\Controllers\Auth\ProviderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AdminProfileControllar;
use App\Http\Controllers\UserController;
// use App\Http\Controllers\AdminAuth\LogoutController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// //google login
// Route::get('login/google', [App\Http\Controllers\Auth\ProviderController::class, 'redirectToGoogle'])->name('login.google');
// Route::get('login/google/callback',  [App\Http\Controllers\Auth\ProviderController::class, 'handleGoogleCallback']);

// // //facebook
Route::get('login/{provider}', [ProviderController::class, 'redirect']);
Route::get('login/{provider}/callback',  [ProviderController::class, 'callback']);
// Route::get('login/facebook', [App\Http\Controllers\Auth\ProviderController::class, 'redirectToFacebook'])->name('login.facebook');
// Route::get('login/facebook/callback',  [App\Http\Controllers\Auth\ProviderController::class, 'handleFacebookCallback']);

// //Github
// Route::get('login/github', [App\Http\Controllers\Auth\ProviderController::class, 'redirectToGithub'])->name('login.github');
// Route::get('login/github/callback',  [App\Http\Controllers\Auth\ProviderController::class, 'handleGithubCallback']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//admin login
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

require __DIR__.'/adminauth.php';
//companies
Route::get('admin/companies/list', [CompaniesController::class, 'index'])->name('companies.list');
Route::get('admin/companies/add', [CompaniesController::class, 'create'])->name('companies.add');
Route::post('admin/companies/add', [CompaniesController::class, 'store']);
Route::any('admin/companies/edit/{id}',[CompaniesController::class, 'edit'])->name('companies.edit');
Route::any('admin/companies/update/{id}',[CompaniesController::class, 'update'])->name('companies.update');
Route::any('admin/companies/destroy/{id}',[CompaniesController::class, 'destroy'])->name('companies.destroy');
Route::get('admin/companies/changeStatus',[CompaniesController::class, 'changeStatus']);

//employee
Route::get('admin/employee/list',[EmployeeController::class, 'index'])->name('employee.list');
Route::get('admin/employee/add',[EmployeeController::class, 'create'])->name('employee.add');
Route::post('admin/employee/add',[EmployeeController::class, 'store']);
Route::any('admin/employee/destroy/{id}',[EmployeeController::class, 'destroy'])->name('employee.destroy');
Route::any('admin/employee/edit/{id}',[EmployeeController::class, 'edit'])->name('employee.edit');
Route::any('admin/employee/update/{id}',[EmployeeController::class, 'update'])->name('employee.update');
Route::get('admin/employee/changeStatuse',[EmployeeController::class, 'changeStatuse']);
///logout Admin
// Route::get('admin/logout',[LogoutController::class, 'perform'])->name('logout.perform');
Route::get('admin/logout', '\App\Http\Controllers\AdminAuth\LogoutController@perform')->name('logout.perform');

Route::get('admin/profile', [AdminProfileControllar::class, 'edit'])->name('admin.profile.edit');
Route::patch('admin/profile', [AdminProfileControllar::class, 'update'])->name('admin.profile.update');

Route::get('admin/dashboard', [EmployeeController::class, 'countemps']);

Route::get('admin/user/list',[UserController::class, 'index'])->name('employee.list');


