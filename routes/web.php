<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TagController;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/lang/{locale}', [LanguageController::class, 'switchLang'])->name('lang.switch');
Route::get('/', [PageController::class, 'homePage'])->name('home.page');
Route::get('/about', [PageController::class, 'aboutPage'])->name('about.page');
Route::get('/contact', [PageController::class, 'contactPage'])->name('contact.page');
Route::get('/blog', [PageController::class, 'blogPage'])->name('blog.page');
Route::get('/blog/{slug}', [PageController::class, 'blogDetail'])->name('blog.detail');
Route::post('/contact', [PageController::class, 'sendContactEmail'])->name('contact.send');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/blogs/{blog}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.delete');

    Route::middleware('admin')->group(function () {

        Route::get('/dashboard', function () {
            $adminCount = User::where('role', 'admin')->count();
            $blogCount = Blog::count();
            return view('dashboard', compact('adminCount', 'blogCount'));
        })->middleware(['verified'])->name('dashboard');

        Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');

        Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notification.read');

        Route::post('/notifications/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.readAll');

        Route::post('/blogs/{blog}/restore', [BlogController::class, 'restore'])->name('blog.restore');

        Route::post('/blogs/import', [BlogController::class, 'importExcel'])->name('blog.import');

        Route::get('/blogs/export-pdf', [BlogController::class, 'exportPdf'])->name('blog.export-pdf');

        Route::get('/blogs/export-excel', [BlogController::class, 'excelExport'])->name('blog.export-excel');

        Route::delete('/blogs/destroy-all', [BlogController::class, 'destroyAll'])->name('blog.destroyall');

        Route::post('/blogs/restore-all', [BlogController::class, 'restoreAll'])->name('blog.restore-all');

        Route::resource('/services', ServiceController::class);

        Route::resource('/carousel', CarouselController::class);

        Route::resource('/blogs', BlogController::class);

        Route::resource('/tags', TagController::class);

        Route::resource('/categories', CategoryController::class);

    });

});

require __DIR__ . '/auth.php';
