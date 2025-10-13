<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RhUserController;

Route::middleware('auth')->group(function () {
    Route::redirect('/', '/home');
    Route::view('/home', 'home')->name('home');
    Route::view('/user/profile', 'user.profile')->name('user.profile');

    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments');
    Route::get('/departments/new-department', [DepartmentController::class, 'newDepartment'])->name('departments.new-department');
    Route::post('/departments/create-department', [DepartmentController::class, 'createDepartment'])->name('departments.create-department');
    Route::get('/departments/update-department/{id}', [DepartmentController::class, 'editDepartment'])->name('departments.edit-department');
    Route::put('/departments/update-department', [DepartmentController::class, 'updateDepartment'])->name('departments.update-department');
    Route::get('/departments/delete-department/{id}', [DepartmentController::class, 'deleteDepartment'])->name('departments.delete-department');
    Route::delete('/departments/delete-department-confirm/{id}', [DepartmentController::class, 'deleteDepartmentConfirm'])->name('departments.delete-department-confirm');

    Route::get('/rh-users', [RhUserController::class, 'index'])->name('colaborators.rh-users');
    Route::get('/rh-users/new-colaborator', [RhUserController::class, 'newColaborator'])->name('colaborators.new-colaborator');
    Route::post('/rh-users/create-colaborator', [RhUserController::class, 'createRhColaborator'])->name('colaborators.create-colaborator');
    Route::get('/rh-users/edit-colaborator/{id}', [RhUserController::class, 'editRhColaborator'])->name('colaborators.edit-colaborator');
    Route::post('/rh-users/update-colaborator/', [RhUserController::class, 'updateRhColaborator'])->name('colaborators.update-colaborator');
    Route::get('/rh-users/delete-colaborator/{id}', [RhUserController::class, 'deleteRhColaborator'])->name('colaborators.delete-colaborator');
    Route::delete('/rh-users/delete-colaborator/{id}', [RhUserController::class, 'deleteRhColaboratorConfirm'])->name('colaborators.delete-colaborator-confirm');
});
