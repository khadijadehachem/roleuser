<?php

use Illuminate\Support\Facades\Route;
/*
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Manager\CategoryController;*/



//use App\Http\Controllers\PermissionController;

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
    return view('welcome');
});

//Auth::routes();
/*
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('roles', RoleController::class);
Route::resource('permissions', PermissionController::class);
Route::resource('users', UserController::class);
*/


Auth::routes(['register' => true]);
// Admin

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionController');
   // Route::resource('permissions', PermissionController::class);

    // Roles
    Route::delete('roles/destroy', 'RoleController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RoleController');

    // companies
    Route::delete('companies/destroy', 'CompanyController@massDestroy')->name('companies.massDestroy');
    Route::resource('companies', 'CompanyController');

    // Users
    Route::delete('users/destroy', 'UserController@massDestroy')->name('users.massDestroy');
    Route::post('users/parse-csv-import', 'UserController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UserController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UserController');

  
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
    }
});

Route::group(['prefix' => 'manager', 'as' => 'manager.', 'namespace' => 'Manager', 'middleware' => ['auth', 'manager']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    //category
    Route::resource('categories', 'CategoryController');
   // Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    
    //Route::resource('categories', CategoryController::class);
    Route::delete('employees/destroy', 'UserController@massDestroy')->name('employees.massDestroy');
    Route::post('users/parse-csv-import', 'UserController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UserController@processCsvImport')->name('users.processCsvImport');
    Route::resource('employees', 'UserController');
   // Route::match(['get', 'patch'], '/employees/user/edit','UserController@edit');
    
});

Route::group(['prefix' => 'employee', 'as' => 'employee.', 'namespace' => 'Employee', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
});/**/
/*
Route::group(['prefix' => 'user', 'as' => 'user.', 'namespace' => 'User', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
});*/