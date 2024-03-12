<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AnnouncementCategoryController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home_index');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [userController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/ticket/form', [TicketController::class, 'form'])->name('ticket_form');
    Route::post('/ticket/save', [TicketController::class, 'save'])->name('ticket_save');
    Route::get('/ticket/user-tickets', [TicketController::class, 'userTickets'])->name('user_tickets');
    Route::get('/ticket/{id}/show', [TicketController::class, 'show'])->name('ticket_show');
    Route::post('/ticket/update', [TicketController::class, 'update'])->name('ticket_update');

    Route::get('/announcement/index', [AnnouncementController::class, 'index'])->name('announcement_index');
    Route::get('/announcement/{id}/show', [AnnouncementController::class, 'show'])->name('announcement_show');
    Route::get('/announcement/add', [AnnouncementController::class, 'add'])->name('announcement_add');
    Route::get('/announcement/save', [AnnouncementController::class, 'save'])->name('announcement_save');
    Route::get('/announcement/{id}/edit', [AnnouncementController::class, 'edit'])->name('announcement_edit');
    Route::get('/announcement/{id}/delete', [AnnouncementController::class, 'delete'])->name('announcement_delete');

    Route::get('/announcement_category/index', [AnnouncementCategoryController::class, 'index'])->name('announcement_category_index');
    Route::get('/announcement_category/add', [AnnouncementCategoryController::class, 'add'])->name('announcement_category_add');
    Route::get('/announcement_category/save', [AnnouncementCategoryController::class, 'save'])->name('announcement_category_save');
    Route::get('/announcement_category/{id}/show', [AnnouncementCategoryController::class, 'show'])->name('announcement_category_show');
    Route::get('/announcement_category/update', [AnnouncementCategoryController::class, 'update'])->name('announcement_category_update');
    Route::get('/announcement_category/{id}/delete', [AnnouncementCategoryController::class, 'delete'])->name('announcement_category_delete');

        // Route::resource('ticket', TicketController::class)->names([
        //     'form' => 'form',
        //     'save' => 'save'
        // ]);

        // // Route::resource('message', MessageController::class);

        // Route::resources([
        //     'ticket' => TicketController::class,
        //     'message' => MessageController::class,
        // ]);

    Route::post('/message/store', [MessageController::class, 'store'])->name('message_store');

Route::get('/pdf', function () {
    $pdf = PDF::loadView('invoice', ['My Big Burger']);
    return $pdf->download('invoice.pdf');
});

});



require __DIR__.'/auth.php';
