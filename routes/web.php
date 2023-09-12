<?php

#use Illuminate\Contracts\View\View;
#use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArticlesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Login;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UsersController;

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
    return view('LogIN');
});


Route::post('/login',[LoginController::class,"login"])->name('login.submit');
Route::post('/Articles/addingArticle',[ArticlesController::class,"saveArticle"])->name('addArticle');


Route::get('/admin/dashboard',[LoginController::class,"dashboard"])->name('dashboard');
Route::get('/users/adduser',[DashboardController::class,"adduser"])->name('adduser');
Route::get('/articles/addarticle',[DashboardController::class,"addarticle"])->name('addarticle');
Route::get('/services/addservice',[DashboardController::class,"addservice"])->name('addservice');
Route::get('/sertings/addsetting',[DashboardController::class,"addsetting"])->name('addsetting');

Route::get('/Users/getUsers', [UsersController::class,"getUsers"])->name('getUsers');
Route::get('/Articles/getArticles', [ArticlesController::class,"getArticles"])->name('getArticles');
Route::get('/Services/getServices', [ServicesController::class,"getServices"])->name('getServices');
Route::get('/Settings/getSettings', [SettingsController::class,"getSettings"])->name('getSettings');

Route::get('/Users/manageUsers', [UsersController::class,"ViewmanageUsers"])->name('Users');
Route::get('/Articles/manageArticles', [ArticlesController::class,"ViewmanageArticles"])->name('Articles');
Route::get('/Services/manageServices', [ServicesController::class,"ViewmanageServices"])->name('Services');
Route::get('/Settings/manageSettings', [SettingsController::class,"ViewmanageSettings"])->name('Settings');

Route::get('/Users/editUser', [UsersController::class,"VieweditUsers"])->name('editUser');
Route::get('/Articles/editArticle', [ArticlesController::class,"VieweditArticle"])->name('editArticle');
Route::get('/Services/editService', [ServicesController::class,"VieweditService"])->name('editService');
Route::get('/Settings/editSettings', [SettingsController::class,"VieweditSettings"])->name('editSettings');
