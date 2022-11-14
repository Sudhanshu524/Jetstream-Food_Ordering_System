<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\VolunteerController;

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
})->name('main');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    if(Auth::check()){

        if(Auth::user()->role == 'partner')
        {
            return redirect()->route('partner#index');
        }
        else if(Auth::user()->role == 'volunteer')
        {
            return redirect()->route('volunteer#index');
        }
    }
})->name('dashboard');

//Partner
Route::group(['prefix' => 'partner'], function(){
    Route::get('/', [PartnerController::class, 'index'])->name('partner#index'); //partner dashboard // view meal
    Route::get('/details/{id}', [PartnerController::class, 'detailsMeal'])->name('partner#detailsMeal'); //partner dashboard // view meal
    Route::get('addMeal', [PartnerController::class, 'addMeal'])->name('partner#addMeal'); //partner create meal
    Route::post('createMeal', [PartnerController::class, 'createMeal'])->name('partner#createMeal'); //creating Meal
    Route::get('editMeal/{id}', [PartnerController::class, 'editMeal'])->name('partner#editMeal'); //edit Meal
    Route::post('updateMeal/{id}', [PartnerController::class, 'updateMeal'])->name('partner#updateMeal'); //update Meal
    Route::get('deleteMeal/{id}', [PartnerController::class, 'deleteMeal'])->name('partner#deleteMeal'); // delete Meal
    Route::get('updatePartner', [PartnerController::class, 'updatePartner'])->name('partner#update'); //update Partner
});

//Volunteer
Route::group(['prefix' => 'volunteer'], function(){
    Route::get('/', [VolunteerController::class, 'index'])->name('volunteer#index'); //volunteer dashboard
    Route::get('volunteerDetails/{id}', [VolunteerController::class, 'volunteerDetails'])->name('volunteer#volunteerDetails'); // volunteer Details
    Route::post('volunteerMember', [VolunteerController::class, 'volunteerMember'])->name('volunteer#volunteerMember'); //volunteer chosen member
});

