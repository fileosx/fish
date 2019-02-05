<?php

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


	Auth::routes(['verify' => true]);


	//Route::middleware(['verified', 'user.active'])->group(function () {
		Route::get('/', 'homeController@index')->middleware("verified")->middleware("user.active")->name("home");

		Route::post('/lead/fetchTypeSegments', 'LeadController@fetchTypeSegments')->middleware("verified")->middleware("user.active")->name("lead.fetch");
		Route::resource("lead", 'LeadController');
	//});


	// Locale switch
	Route::get('/language/{lang}', function ($lang) {
		Session::put('locale', $lang);
		return back();
	})->name('langroute');