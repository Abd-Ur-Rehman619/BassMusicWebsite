<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CaptchaServiceController;
use App\Http\Controllers\DashbaordController;
use App\Http\Middleware\PreventBackHistory;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SummaryController;
use App\Http\Controllers\LikeController;
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

Route::middleware(['guest:web', 'PreventBackHistory'])->group(function ()
{
    Route::controller(HomeController::class)->group(function ()
    {
        Route::get('/', 'index')->name('index');
        Route::get('/latest.ablums', 'Albums')->name('Ablums');
        Route::get('/latest.events', 'Events')->name('events');
        Route::get('/latest.news', 'News')->name('news');
        Route::get('/contactform', 'contactUs')->name('contactUs');
        Route::get('/login', 'Login')->name('login');
        Route::get('/usersignUp', 'Registration')->name('register');
    });
    Route::post('/contactUs', [MessageController::class, 'SendMessage'])->name('SendMessage');
    Route::get('/reload-captcha', [CaptchaServiceController::class, 'reloadCaptcha']);
    Route::post('/user.signUp', [UserController::class, 'Register'])->name('user.register');
    Route::post('/user.login', [UserController::class, 'loginCheck'])->name('user.login');
});

Route::prefix('Visitor')->name('Visitor.')->group(function (){
    Route::middleware(['auth:web', 'PreventBackHistory'])->group(function () {
        Route::get('/dashboard', [DashbaordController::class, 'userDashboard'])->name('dashboard');
        Route::view('/profile', 'Visitors.profile')->name('profile');
        Route::put('/{id}/edit/', [UserController::class, 'updateUser'])->name('updateUser');

        Route::get('/events', [EventController::class, 'userEvents'])->name('events.index');
        Route::get('/category', [CategoryController::class, 'userCategories'])->name('category.index');
        Route::get('/news', [NewsController::class, 'userNews'])->name('news.index');
        Route::get('/musics', [MusicController::class, 'userMusics'])->name('musics.index');
        Route::get('/musics/{id}', [MusicController::class, 'userShowMusic'])->name('musics.show');

        Route::get('/comments', [CommentController::class, 'userComments'])->name('comments.index');
        Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
        Route::get('/comments/{id}/edit', [CommentController::class, 'userEditComment'])->name('comments.edit');
        Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
        Route::put('/comments/{id}', [CommentController::class, 'update'])->name('comments.update');

        Route::post('/likes', [LikeController::class, 'store'])->name('likes.store');
        Route::post('/liked', [LikeController::class, 'edit'])->name('likes.edit');
        Route::put('/likes/{id}', [LikeController::class, 'update'])->name('likes.update');
        Route::get('/summary', [SummaryController::class, 'userSummaries'])->name('summary.index');
    });
});

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::prefix('Creator')->name('Creator.')->group(function (){
    Route::middleware(['auth:web', 'PreventBackHistory'])->group(function () {
        Route::get('/dashboard', [DashbaordController::class, 'creatorDashboard'])->name('dashboard');
        Route::view('/profile', 'Creator.profile')->name('profile');
        Route::put('/{id}/edit/', [UserController::class, 'updateUser'])->name('updateUser');
        Route::get('/visitors', [UserController::class, 'normalUsers'])->name('visitors');
        Route::put('/status/{id}', [UserController::class, 'updateStatus'])->name('changeStatus');
        Route::view('/add', 'Creator.addUser')->name('addUser');
        Route::post('/addnew', [UserController::class, 'addNewUser'])->name('addNewUser');
        Route::get('{id}/edit/', [UserController::class, 'edit'])->name('editUser');
        Route::put('/{id}/edit/', [UserController::class, 'updateUser'])->name('updateUser');
        Route::get('/delete/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');

        Route::get('/events', [EventController::class, 'events'])->name('events.index');
        Route::get('/events/create', [EventController::class, 'addEvent'])->name('events.create');
        Route::post('/events', [EventController::class, 'store'])->name('events.store');
        Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
        Route::get('/events/{id}/edit', [EventController::class, 'editEvent'])->name('events.edit');
        Route::put('/events/{id}', [EventController::class, 'update'])->name('events.update');
        Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');

        Route::get('/category', [CategoryController::class, 'categories'])->name('category.index');
        Route::get('/category/create', [CategoryController::class, 'addCategory'])->name('category.create');
        Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');
        Route::get('/category/{id}/edit', [CategoryController::class, 'editCategory'])->name('category.edit');
        Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');
        Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

        Route::get('/news', [NewsController::class, 'news'])->name('news.index');
        Route::get('/news/create', [NewsController::class, 'addNews'])->name('news.create');
        Route::post('/news', [NewsController::class, 'store'])->name('news.store');
        Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
        Route::get('/news/{id}/edit', [NewsController::class, 'editNews'])->name('news.edit');
        Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
        Route::put('/news/{id}', [NewsController::class, 'update'])->name('news.update');
        Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

        Route::get('/musics', [MusicController::class, 'musics'])->name('musics.index');
        Route::get('/musics/create', [MusicController::class, 'addMusic'])->name('musics.create');
        Route::post('/musics', [MusicController::class, 'store'])->name('musics.store');
        Route::get('/musics/{id}', [MusicController::class, 'showMusic'])->name('musics.show');
        Route::get('/musics/{id}/edit', [MusicController::class, 'editMusic'])->name('musics.edit');
        // Route::get('/musics/{id}', [MusicController::class, 'show'])->name('musics.show');
        Route::put('/musics/{id}', [MusicController::class, 'update'])->name('musics.update');
        Route::delete('/musics/{id}', [MusicController::class, 'destroy'])->name('musics.destroy');

        Route::get('/comments', [CommentController::class, 'comments'])->name('comments.index');
        Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
        Route::get('/comments/{id}/edit', [CommentController::class, 'editComment'])->name('comments.edit');
        Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
        Route::put('/comments/{id}', [CommentController::class, 'update'])->name('comments.update');

        Route::post('/likes', [LikeController::class, 'store'])->name('likes.store');
        Route::post('/liked', [LikeController::class, 'edit'])->name('likes.edit');
        Route::put('/likes/{id}', [LikeController::class, 'update'])->name('likes.update');

        Route::get('/summary', [SummaryController::class, 'summaries'])->name('summary.index');
        Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    });
});


Route::prefix('admin')->name('admin.')->group(function (){
    Route::middleware(['guest:admin', 'PreventBackHistory'])->group(function () {
        Route::view('/login', 'admin.login')->name('login');
        Route::post('check', [AdminController::class, 'loginCheck'])->name('loginCheck');
    });

    Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function () {
        Route::get('/dashboard', [DashbaordController::class, 'adminDashboard'])->name('dashboard');
        Route::view('/profile', 'admin.profile')->name('profile');
        Route::post('/profile', [AdminController::class, 'editProfile'])->name('editprofile');
        Route::get('/visitors', [UserController::class, 'visitors'])->name('visitors');
        Route::put('/status/{id}', [UserController::class, 'updateStatus'])->name('changeStatus');
        Route::view('/add', 'admin.addUser')->name('addUser');
        Route::post('/addnew', [UserController::class, 'addNewUser'])->name('addNewUser');
        Route::get('{id}/edit/', [UserController::class, 'editUser'])->name('editUser');
        Route::put('/{id}/edit/', [UserController::class, 'updateUser'])->name('updateUser');
        Route::get('/delete/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');
        Route::get('/creators', [UserController::class, 'creators'])->name('creators');
        Route::get('/archievedCreators', [UserController::class, 'deletedCreators'])->name('archievdCreators');
        Route::get('/restored/{id}', [UserController::class, 'restored'])->name('restore');
        Route::get('/permanently/{id}', [UserController::class, 'permanentlyDelete'])->name('permanentlyDelete');

        Route::get('/events', [EventController::class, 'index'])->name('events.index');
        Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
        Route::post('/events', [EventController::class, 'store'])->name('events.store');
        Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
        Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
        Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
        Route::put('/events/{id}', [EventController::class, 'update'])->name('events.update');
        Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');

        Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');
        Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
        Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');
        Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

        Route::get('/news', [NewsController::class, 'index'])->name('news.index');
        Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
        Route::post('/news', [NewsController::class, 'store'])->name('news.store');
        Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
        Route::get('/news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
        Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
        Route::put('/news/{id}', [NewsController::class, 'update'])->name('news.update');
        Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

        Route::get('/musics', [MusicController::class, 'index'])->name('musics.index');
        Route::get('/musics/create', [MusicController::class, 'create'])->name('musics.create');
        Route::post('/musics', [MusicController::class, 'store'])->name('musics.store');
        Route::get('/musics/{id}', [MusicController::class, 'show'])->name('musics.show');
        Route::get('/musics/{id}/edit', [MusicController::class, 'edit'])->name('musics.edit');
        Route::get('/musics/{id}', [MusicController::class, 'show'])->name('musics.show');
        Route::put('/musics/{id}', [MusicController::class, 'update'])->name('musics.update');
        Route::delete('/musics/{id}', [MusicController::class, 'destroy'])->name('musics.destroy');

        Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
        Route::get('/comments/create', [CommentController::class, 'create'])->name('comments.create');
        Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
        Route::get('/comments/{id}', [CommentController::class, 'show'])->name('comments.show');
        Route::get('/comments/{id}/edit', [CommentController::class, 'edit'])->name('comments.edit');
        Route::get('/comments/{id}', [CommentController::class, 'show'])->name('comments.show');
        Route::put('/comments/{id}', [CommentController::class, 'update'])->name('comments.update');
        Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');

        Route::get('/summary', [SummaryController::class, 'index'])->name('summary.index');
        Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
        Route::delete('/messages/{id}', [MessageController::class, 'destroy'])->name('messages.destroy');

        Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
    });
});

Route::post('/fetch_categories', [CategoryController::class, 'fetchCategories']);


