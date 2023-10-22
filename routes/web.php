<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EventController;

//ReviewControllerの使用
use App\Http\Controllers\ReviewController;

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

// 認証機能
// Route::get('/', [PostController::class, 'index'])->name('index')->middleware('auth');
//認証機能
Route::get('/', [ReviewController::class, 'mapping'])->name('index')->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 仮にマッピングを表示するページを用意した
Route::get('/events/index', function () {
    return view('events/index');
})->middleware(['auth', 'verified'])->name('events.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/event', [EventController::class, 'index'])->name('event');

Route::get('/event/{id}', [EventController::class,'show'])->name('event.show');

Route::post('/event/{id}/evaluate', [EventController::class,'evaluation'])->name('event.evaluate');

require __DIR__.'/auth.php';



//ホーム画面(マッピング画面)を表示。
Route::get('/events/index', [ReviewController::class, 'mapping']);

//イベント詳細画面を表示。
Route::get('/events/{event}', [ReviewController::class, 'event']);

//レビュー作成画面を表示。
Route::get('/events/{event}/review', [ReviewController::class, 'review']);

//レビューを保存する。
Route::post('/events/{event}', [ReviewController::class, 'store']);