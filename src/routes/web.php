<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookIssueController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['guest']], function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('post-login', [AuthController::class, 'postLogin'])->name('login-post');
});

Route::middleware('auth')->group(function () {
    Route::redirect('/', '/dashboard');
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    Route::prefix('categories')->controller(CategoryController::class)->group(function () {
        Route::get('/', 'index')->name('categories.index');
        Route::get('create', 'create')->name('categories.create');
        Route::post('/', 'store')->name('categories.store');
    });

    Route::prefix('authors')->controller(AuthorController::class)->group(function () {
        Route::get('/', 'index')->name('authors.index');
        Route::get('create', 'create')->name('authors.create');
        Route::post('/', 'store')->name('authors.store');
    });

    Route::prefix('publishers')->controller(PublisherController::class)->group(function () {
        Route::get('/', 'index')->name('publishers.index');
        Route::get('create', 'create')->name('publishers.create');
        Route::post('/', 'store')->name('publishers.store');
    });

    Route::prefix('users')->controller(UserController::class)->group(function () {
        Route::get('/', 'index')->name('users.index');
        Route::get('create', 'create')->name('users.create');
        Route::post('/', 'store')->name('users.store');
        Route::get('/{id}/edit', 'edit')->name('users.edit');
        Route::put('/{id}', 'update')->name('users.update');
    });

    Route::prefix('setting')->controller(SettingController::class)->group(function () {
        Route::get('/', 'show')->name('setting.show');
        Route::get('/{id}/edit', 'edit')->name('setting.edit');
        Route::put('/{id}', 'update')->name('setting.update');
    });

    Route::prefix('books')->controller(BookController::class)->group(function () {
        Route::get('/', 'index')->name('books.index');
        Route::get('create', 'create')->name('books.create');
        Route::post('/', 'store')->name('books.store');
        Route::get('/{id}', 'show')->name('books.show');
        Route::get('/{id}/edit', 'edit')->name('books.edit');
        Route::put('/{id}', 'update')->name('books.update');
    });

    Route::prefix('book-issues')->controller(BookIssueController::class)->group(function () {
        Route::get('/', 'index')->name('issue-books.index');
        Route::get('create', 'create')->name('issue-books.create');
        Route::post('/', 'store')->name('issue-books.store');
        Route::get('/{id}/edit', 'edit')->name('issue-books.edit');
        Route::put('/{id}', 'update')->name('issue-books.update');
    });

    Route::prefix('api')->group(function () {
        Route::get('/categories', [CategoryController::class, 'apiIndex'])->name('api.category');
        Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

        Route::get('/authors', [AuthorController::class, 'apiIndex'])->name('api.author');
        Route::delete('/authors/{id}', [AuthorController::class, 'destroy']);

        Route::get('/publishers', [PublisherController::class, 'apiIndex'])->name('api.publisher');
        Route::delete('/publishers/{id}', [PublisherController::class, 'destroy']);

        Route::get('/users', [UserController::class, 'apiIndex'])->name('api.user');
        Route::delete('/users/{id}', [UserController::class, 'destroy']);

        Route::get('/books', [BookController::class, 'apiIndex'])->name('api.book');
        Route::delete('/books/{id}', [BookController::class, 'destroy']);

        Route::get('/book-issues', [BookIssueController::class, 'apiIndex'])->name('api.issue-books');
    });
    
    Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
});
