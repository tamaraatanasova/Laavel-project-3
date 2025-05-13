<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PageControler;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', [PageControler::class, 'index'])->name('homepage');

Route::post('/company_contact', [CompanyController::class, 'submit'])->name('company.contact.submit');

// Resource route for projects
Route::resource('projects', ProjectController::class);

// Custom delete route for projects
Route::put('/project/{id}', [ProjectController::class, 'update'])->name('projects.update');
Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('project.destroy');

Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');


// Admin routes
Route::get('/login', [AdminController::class, 'loginForm'])->name('admin.loginForm');
Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Custom store route for projects (this is redundant with resource route)
Route::post('/projects', [ProjectController::class, 'store'])->name('store');

// Custom edit view route (this seems unnecessary)
Route::get('/edit', [ProjectController::class, 'editView'])->name('edit');