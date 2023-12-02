<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DriveController;

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
    return view('auth.login');
});
Route::middleware("auth")->group(function(){


    Route::prefix("user")->group(function () {
        Route::get("profile",[UserController::class,'profile'])->name("user.profile");
        Route::post("Uploadimg",[UserController::class,'Uploadimg'])->name("user.Uploadimg");

    });


Route::prefix("drive")->group(function () {

    Route::get("/AllFiles",[DriveController::class,'AllFiles'])->name("drive.AllFiles")->middleware("admin");
    Route::get("/Publicfile",[DriveController::class,'Publicfile'])->name("drive.Publicfile");
    Route::get("/MyFiles",[DriveController::class,'MyFiles'])->name("drive.MyFiles");
    Route::get("/create",[DriveController::class,'create'])->name("drive.create");
    Route::post("/store",[DriveController::class,'store'])->name("drive.store");
    Route::post("/store",[DriveController::class,'store'])->name("drive.store");
    Route::get("/notFound",[DriveController::class,'notFound'])->name("drive.notFound");
    // with ID
    Route::post("/update/{id}",[DriveController::class,'update'])->name("drive.update");
    Route::get("/edit/{id}",[DriveController::class,'edit'])->name("drive.edit");
    Route::get("/show/{id}",[DriveController::class,'show'])->name("drive.show");
    Route::get("/destroy/{id}",[DriveController::class,'destroy'])->name("drive.destroy");
    Route::get("download/{id}",[DriveController::class,'download'])->name("drive.download");
    Route::get("changeStatus/{id}",[DriveController::class,'changeStatus'])->name("drive.changeStatus");

});





});







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
