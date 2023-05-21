<?php

use Illuminate\Support\Facades\Route;
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
Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/home', [App\Http\Controllers\homeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home/admin.profiles', [App\Http\Controllers\HomeController::class, 'profilesadmin'] )->name('profiles');
Route::get('/home/profile', [App\Http\Controllers\HomeController::class, 'profile'] )->name('profile');
Route::get('/home/tickets.ticket', [App\Http\Controllers\HomeController::class, 'tickets'] )->name('tickets.ticket');
Route::get('/home/resolveurs.profile', [App\Http\Controllers\HomeController::class, 'profilee'] )->name('resolveurs.profile');

Route::group(['middleware' => ['auth']], function() {

    Route::get('/logout', 'App\Http\Controllers\LogoutController@perform')->name('logout.perform');
 });
 Route::middleware(['auth','role:auth->users->role'])->group(function(){

    Route::get('/home','App\Http\Controllers\HomeController@index')->name('home');
    
    });

Route::get('/ssearch','App\Http\Controllers\ReclameurController@ssearch')->name('reclameurs.ssearch');
Route::get('/sssearch','App\Http\Controllers\ResolveurController@sssearch')->name('resolveurs.sssearch');
Route::get('/ssssearch','App\Http\Controllers\ProjectController@ssssearch')->name('projects.ssssearch');
Route::get('/search','App\Http\Controllers\ClientController@search')->name('clients.search');
Route::get('/users.createe','App\Http\Controllers\UserController@createe')->name('users.createe');

Route::post('/users.storee','App\Http\Controllers\UserController@storee')->name('users.storee');
Route::resource('/admins','App\Http\Controllers\AdminController');
Route::resource('/tickets','App\Http\Controllers\TicketController');
Route::resource('/users','App\Http\Controllers\userController');

 Route::resource('/reclameurs','App\Http\Controllers\ReclameurController');
 Route::resource('/resolveurs','App\Http\Controllers\ResolveurController');
 Route::resource('/clients','App\Http\Controllers\ClientController');
 Route::resource('/projects','App\Http\Controllers\ProjectController');
 Route::resource('/reclameurrs','App\Http\Controllers\ReclamController');
 Route::resource('/resolveurrs','App\Http\Controllers\ResolController');
 Route::resource('/ticketchefs','App\Http\Controllers\TicketchefController');
 Route::resource('/tires','App\Http\Controllers\tireController');
 Route::resource('/ticks','App\Http\Controllers\tickController');
 Route::resource('/fermes','App\Http\Controllers\fermeController');
 Route::resource('/resfes','App\Http\Controllers\resfeController');
 Route::resource('/adticks','App\Http\Controllers\adtickController');
 Route::get('/resfes.search','App\Http\Controllers\resfeController@search')->name('resfes.search');
 Route::resource('/adferms','App\Http\Controllers\adfermController');
 Route::get('/adferms.search','App\Http\Controllers\adfermController@search')->name('adferms.search');
 Route::get('/ticketchefs.ferme', [App\Http\Controllers\HomeController::class, 'fermee'] )->name('ticketchefs.ferme');
 Route::get('/ticketchefs.ferm', [App\Http\Controllers\HomeController::class, 'fermeee'] )->name('ticketchefs.ferm');
 Route::get('/ticketchefs.search','App\Http\Controllers\ticketchefController@search')->name('ticketchefs.search');
 Route::get('/ticks.search','App\Http\Controllers\tickController@search')->name('ticks.search');
 Route::get('/tickets.search','App\Http\Controllers\ticketController@search')->name('tickets.search');
 Route::get('/fermes.search','App\Http\Controllers\fermeController@search')->name('fermes.search');
 Route::get('/download/{file}','App\Http\Controllers\HomeController@download')->name('download');
 Route::get('/adticks.search','App\Http\Controllers\adtickController@search')->name('adticks.search');
Route::get('/delete/{id}','App\Http\Controllers\reclameurController@delete')->name('delete');
Route::get('/deletee/{id}','App\Http\Controllers\resolveurController@deletee')->name('deletee');
Route::get('/deleteee/{id}','App\Http\Controllers\projectController@deleteee')->name('deleteee');
Route::get('/deleteeee/{id}','App\Http\Controllers\clientController@deleteeee')->name('deleteeee');
 

