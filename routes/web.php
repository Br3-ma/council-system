<?php

use App\Http\Controllers\DashbaordController;
use App\Http\Controllers\RevenueStreamController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;
use App\Livewire\Dashboard\Calendar;
use App\Livewire\Dashboard\Dashboard;
use App\Livewire\Dashboard\Districts;
use App\Livewire\Dashboard\Reciepts;
use App\Livewire\Dashboard\ReportGenerator;
use App\Livewire\Dashboard\RevenueStreams;
use App\Livewire\Dashboard\StaffMember;
use App\Livewire\Dashboard\Task;
use App\Livewire\Dashboard\Transaction;
use App\Livewire\Dashboard\TransactionDetail;
use App\Livewire\Dashboard\UserRoles;
use Illuminate\Support\Facades\Route;

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



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/', Dashboard::class)->name('welcome');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    Route::get('/calendar', Calendar::class)->name('calendar');
    Route::get('/districts', Districts::class)->name('districts');
    Route::get('/staff-members', StaffMember::class)->name('staff-members');
    
    Route::get('/revenue-streams', RevenueStreams::class)->name('streams');
    Route::resource('streams', RevenueStreamController::class);

    Route::get('/tasks', StaffMember::class)->name('tasks');
    Route::get('/user-roles', UserRoles::class)->name('roles');

    Route::get('/tasks', Task::class)->name('tasks');
    Route::get('/transactions', Transaction::class)->name('transactions');
    Route::get('/receipts', Reciepts::class)->name('receipts');
    Route::get('/transaction-details/{id}', TransactionDetail::class)->name('details');

    Route::get('/report-generator', ReportGenerator::class)->name('generator');
    
    // Controllers
    Route::post('/create-user', [UserController::class, 'store'])->name('create-user');
    Route::get('/delete-staff/{id}', [UserController::class, 'destroy'])->name('delete-staff');
    Route::get('/delete-role/{id}', [UserRoleController::class, 'destroy'])->name('delete-role');
    
    Route::post('/create-role', [UserRoleController::class, 'store'])->name('create-role');
    Route::post('/bulk-upload', [TransactionController::class, 'bulk_upload'])->name('bulk-upload');
    Route::get('/export-streams', [RevenueStreamController::class, 'export_streams'])->name('export-streams');
    Route::get('/export-report', [TransactionController::class, 'export_report'])->name('export-report');
    Route::get('/export-transactions', [TransactionController::class, 'export_transactions'])->name('export-transactions');
    
    // APIs
    Route::get('/collections_by_streams', [DashbaordController::class, 'collections_by_streams'])->name('area-trend');

});


