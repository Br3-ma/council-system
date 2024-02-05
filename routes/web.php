<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;
use App\Livewire\Dashboard\Calendar;
use App\Livewire\Dashboard\Dashboard;
use App\Livewire\Dashboard\Districts;
use App\Livewire\Dashboard\ReportGenerator;
use App\Livewire\Dashboard\RevenueStreams;
use App\Livewire\Dashboard\StaffMember;
use App\Livewire\Dashboard\Task;
use App\Livewire\Dashboard\Transaction;
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
    Route::get('/tasks', StaffMember::class)->name('tasks');
    Route::get('/user-roles', UserRoles::class)->name('roles');

    Route::get('/tasks', Task::class)->name('tasks');
    Route::get('/transactions', Transaction::class)->name('transactions');


    Route::get('/report-generator', ReportGenerator::class)->name('generator');


    // Controllers
    Route::post('/create-user', [UserController::class, 'store'])->name('create-user');
    Route::post('/create-role', [UserRoleController::class, 'store'])->name('create-role');
});


