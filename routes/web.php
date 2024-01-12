<?php

use App\Models\Customer;
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

Route::get('/customers/create', [CustomerController::class, 'create']);
// Route::post('/customers/create',[CustomerController::class,'create']);
Route::post('/customers/store', [CustomerController::class, 'store']);

Route::get('/customers/view', [CustomerController::class, 'view']);
Route::get('/customers/delete/{id}', [CustomerController::class, 'delete']);
Route::get('customers/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
Route::post('customers/update/{id}', [CustomerController::class, 'update'])->name('customer.update');

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
