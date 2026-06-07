<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SerasiController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DivisiController;
use App\Http\Controllers\Admin\KabinetController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Admin\OurProjectController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;
use App\Models\Divisi;
use App\Models\Kabinet;
use App\Models\Program;
use App\Models\OurProject;
use App\Models\Comment;

Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('admin.dashboard');

// Halaman depan
Route::get('/serasi', [SerasiController::class, 'index']);
Route::post('/serasi', [SerasiController::class, 'store'])->name('serasi.store');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

// Admin (gunakan middleware auth jika perlu)
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/serasi', [SerasiController::class, 'indexAdmin'])->name('serasi.index');
    Route::get('/serasi/create', [SerasiController::class, 'create'])->name('serasi.create');
    Route::post('/serasi', [SerasiController::class, 'storeAdmin'])->name('serasi.store');
    Route::get('/serasi/{id}/edit', [SerasiController::class, 'edit'])->name('serasi.edit');
    Route::put('/serasi/{id}', [SerasiController::class, 'update'])->name('serasi.update');
    Route::delete('/serasi/{id}', [SerasiController::class, 'destroy'])->name('serasi.destroy');
    Route::resource('users', UserController::class);
    Route::resource('divisi', DivisiController::class);
    Route::resource('kabinet', KabinetController::class);
    Route::resource('program', ProgramController::class);
    Route::resource('our-project', OurProjectController::class);
    Route::resource('comment', AdminCommentController::class)->only(['index', 'destroy']);
});

Route::get('/', function () {
    $divisis = Divisi::all();
    $kabinet = Kabinet::latest()->first();
    $programs = Program::all();
    $ourProjects = OurProject::latest()->get();
    $comments = Comment::latest()->get();
    return view('welcome', compact('divisis', 'kabinet', 'programs', 'ourProjects', 'comments'));
});

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';