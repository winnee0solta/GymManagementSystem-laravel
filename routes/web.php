<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/login');
});
Route::get('/login', 'AuthController@loginView')->name('login');
Route::post('/login', 'AuthController@loginUser');
Route::get('/logout', 'AuthController@logout')->middleware(['auth']);
/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'checkifadmin'])->group(function () {

    Route::get('/dashboard', 'Dashboard\HomeController@index');
    Route::get('/dashboard/members', 'Dashboard\MembersController@index');
    Route::post('/dashboard/members/add', 'Dashboard\MembersController@store');
    Route::get('/dashboard/members/{member_id}/view', 'Dashboard\MembersController@view');
    Route::post('/dashboard/members/{member_id}/edit', 'Dashboard\MembersController@update');
    Route::get('/dashboard/members/{member_id}/remove', 'Dashboard\MembersController@destroy');

    //plans
    Route::post('/dashboard/members/{member_id}/nutritionplan-add', 'Dashboard\NutritionPlansController@store');
    Route::post('/dashboard/members/{member_id}/workoutplan-add', 'Dashboard\WorkoutPlansController@store');


    //attendance
    Route::get('/dashboard/attendance', 'Dashboard\AttendanceController@index');
    Route::get('/dashboard/attendance/{member_id}/present', 'Dashboard\AttendanceController@setP');
    Route::get('/dashboard/attendance/{member_id}/absent', 'Dashboard\AttendanceController@setA');
});



/*
|--------------------------------------------------------------------------
| Site Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'checkifpublic'])->group(function () {
    Route::get('/site', 'Site\HomeController@index');
});
