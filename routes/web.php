<?php

use App\Models\Customer;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UploadController;
use Symfony\Component\HttpFoundation\Request;

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

Route::get('/customer', function () {
    $customers = Customer::all();
    echo "<pre>";
    print_r($customers->toArray());
});

Route::group(["prefix" => "customers/"], function () {

    Route::get('create', [CustomerController::class, 'create']);
    // Route::post('create',[CustomerController::class,'create']);
    Route::post('store', [CustomerController::class, 'store']);

    Route::get('view', [CustomerController::class, 'view']);
    Route::get('delete/{id}', [CustomerController::class, 'delete']);
    Route::get('edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('update/{id}', [CustomerController::class, 'update'])->name('customer.update');
});


Route::get('/{lang?}', function ($lang = null) {
    App::setlocale($lang);
    return view('welcome');
});

Route::get('get-session', function () {
    $session = session()->all();
    echo "<pre>";
    print_r($session);
});

Route::get('set-session', function (Request $request) {
    $request . session()->put('user_name', 'Loke');
    $request . session()->put('user_id', 'kjdf38488972098hdd');
    $request . session()->flash('status', 'success');
    return redirect('get-session');
});

Route::get('destroy-session', function (Request $request) {
    $request . session()->forget('user_name');
    $request . session()->forget('user_id');

    return redirect('get-session');
});

Route::get('upload', function () {
    return view('upload');
});

Route::post('upload', [UploadController::class, 'upload']);
