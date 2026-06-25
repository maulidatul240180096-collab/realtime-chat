<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MyProfileController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [ChatController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');
    
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

       // MY PROFILE
    Route::get('/my-profile', [MyProfileController::class, 'index'])
        ->name('profile.index');

    Route::get('/my-profile/edit', [MyProfileController::class, 'edit'])
        ->name('profile.edit.my');

    Route::post('/my-profile/update', [MyProfileController::class, 'update'])
        ->name('profile.update.my');

    // CONTACTS
    Route::get('/contacts', [ContactController::class, 'index'])
        ->name('contacts.index');

    Route::get('/contacts/create', [ContactController::class, 'create'])
        ->name('contacts.create');

    Route::post('/contacts', [ContactController::class, 'store'])
        ->name('contacts.store');

    // CHAT
     Route::get('/chat/{user}', [ChatController::class, 'show'])
     ->name('chat.show');

     Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');

     Route::post('/message/send', [MessageController::class, 'send']);

     Route::delete('/message/{message}', [MessageController::class, 'destroy'])
    ->name('message.destroy');

        
});

require __DIR__.'/auth.php';
