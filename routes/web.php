<?php

use App\Http\Controllers\PostDashboardController;
use App\Http\Controllers\ProfileController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

$renderHome = function () {
    $latestPosts = Post::latest()->take(4)->get();

    return view('home', [
        'title' => 'Home Page',
        'latestPosts' => $latestPosts,
    ]);
};

$renderBlog = function () {
    $posts = Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString();

    return view('posts', ['title' => 'Blog Page ygy'], ['posts' => $posts]);
};

Route::get('/', $renderHome)->name('home');

Route::get('/home', $renderHome);

Route::get('/blog', $renderBlog)->name('blog.index');

Route::get('/posts', $renderBlog);

Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', ['title' => 'Single Post Page', 'post' => $post]);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About Page']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Page']);
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [PostDashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::post('/dashboard', [PostDashboardController::class, 'store'])
    ->middleware(['auth', 'verified']);

Route::get('/dashboard/create', [PostDashboardController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.post.create');

Route::delete('/dashboard/{post:slug}', [PostDashboardController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.post.destroy');

Route::get('/dashboard/{post:slug}/edit', [PostDashboardController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.post.edit');

Route::patch('/dashboard/{post:slug}', [PostDashboardController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.post.update');

Route::get('/dashboard/{post:slug}', [PostDashboardController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.post.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/upload', [ProfileController::class, 'upload'])->name('profile.upload');
    Route::delete('/upload', [ProfileController::class, 'revert'])->name('profile.upload.revert');
});

require __DIR__ . '/auth.php';
