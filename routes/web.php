<?php

use App\Http\Controllers\DropzoneController;
use App\Http\Controllers\EmpController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\PaymentGateway\Payment;

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

Route::get('/payment', function(){
    return Payment::process();
});

Route::get('/employee', [EmployeeController::class, 'index']);

Route::get('/export-excel', [EmployeeController::class, 'exportIntoExcel']);

Route::get('/export-csv', [EmployeeController::class, 'exportIntoCSV']);

Route::get('/get-all-employee', [EmpController::class, 'getAllEmployee']);

Route::get('/download-pdf', [EmpController::class, 'downloadPDF']);

Route::get('/import-form', [EmployeeController::class, 'importForm']);

Route::post('/import', [EmployeeController::class, 'import'])->name('employee.import');

Route::get('/dropzone', [DropzoneController::class, 'dropzone']);

Route::post('/dropzone-store', [DropzoneController::class, 'dropzoneStore'])->name('dropzone.store');