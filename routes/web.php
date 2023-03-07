<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(Auth::check()){
        return view('home');
    }else{
        return view('welcome');
    }
});

Auth::routes();

Route::resource('activity','\App\Http\Controllers\ActivityController')->names('activity');
Route::resource('/area','\App\Http\Controllers\AreaController')->names('area');
Route::resource('/assistance','\App\Http\Controllers\AssistanceController')->names('assistance');
Route::resource('/dailyAdvance','\App\Http\Controllers\DailyAdvanceController')->names('dailyAdvance');
Route::resource('/employee','\App\Http\Controllers\EmployeeController')->names('employee');
Route::resource('/enforcement','\App\Http\Controllers\EnforcementController')->names('enforcement');
Route::resource('/flowerpot','\App\Http\Controllers\FlowerpotController')->names('flowerpot');
Route::resource('/illness','\App\Http\Controllers\IllnessController')->names('illness');
Route::resource('/ingredient','\App\Http\Controllers\IngredientController')->names('ingredient');
Route::resource('/input','\App\Http\Controllers\InputController')->names('input');
Route::resource('/permission','\App\Http\Controllers\PermissionController')->names('permission');
Route::resource('/personalEvaluation','\App\Http\Controllers\PersonalEvaluationController')->names('personalEvaluation');
Route::resource('/plague','\App\Http\Controllers\PlagueController')->names('plague');
Route::resource('/property','\App\Http\Controllers\PropertyController')->names('property');
Route::resource('/rol','\App\Http\Controllers\RoleController')->names('rol');
Route::resource('/user','\App\Http\Controllers\UserController')->names('user');
Route::resource('/wage','\App\Http\Controllers\WageController')->names('wage');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/test',function(){
    $user=User::find(2);
    Gate::authorize('haveaccess','user.create');
    return $user;
    //return $user->havePermission('user.index');
});
