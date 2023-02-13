<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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

Route::get('/{lang?}', function ($lang = null) {
    App::setLocale($lang);
    return view('welcome');
});

Route::get('/register',[RegisterationController::class,'index']);
Route::post('/register',[RegisterationController::class,'register'])->name('register');
// Grouped Route
Route::group(['prefix'=>'/customer'],function(){
    Route::get('/view',[RegisterationController::class,'show'])->name('customer.table');
    Route::get('/trash',[RegisterationController::class,'trash'])->name('customer.trash');   // Trash
    Route::get('/delete/{id}',[RegisterationController::class,'delete'])->name('customer.delete');
    Route::get('/restore/{id}',[RegisterationController::class,'restore'])->name('customer.restore'); // Restore
    Route::get('/forceDelete/{id}',[RegisterationController::class,'forceDelete'])->name('customer.forceDelete'); // force delete
    Route::get('/edit/{id}',[RegisterationController::class,'edit'])->name('customer.edit');
    Route::post('/update/{id}',[RegisterationController::class,'update'])->name('customer.update');
});


// Get All Session
Route::get('get-all-session',function(){

    $session = session()->all();
    echo "<pre>";
    print_r($session);
});
// set session

Route::get('set-session',function(Request $request){
    $request->session()->put('user_name','Ali');
    $request->session()->put('password','123');
    $request->session()->flash('status','Success');
    return redirect('get-all-session');
});
Route::get('destroy-session',function(){
    // session()->forget('user_name');
    // session()->forget('password');
    session()->forget(['user_name','password']);
    return redirect('get-all-session');
});
