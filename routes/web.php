<?php

use App\Http\Controllers\admin\adminBlogController;
use App\Http\Controllers\admin\adminFaqController;
use App\Http\Controllers\admin\adminPageController;
use App\Http\Controllers\admin\SettingContoller;
use App\Http\Controllers\admin\TempImageController;
use App\Http\Controllers\admin\TempImageControllerForBlog;
use App\Http\Controllers\admin\TempImageControllerForPage as AdminTempImageControllerForPage;
use App\Http\Controllers\admin\userContrller;
use App\Http\Controllers\adminServiceController;
use App\Http\Controllers\fontend\AboutController;
use App\Http\Controllers\fontend\BlogsController;
use App\Http\Controllers\fontend\ContactController;
use App\Http\Controllers\fontend\FaqController;
use App\Http\Controllers\fontend\HomeController;
use App\Http\Controllers\fontend\ManagePageContorller;
use App\Http\Controllers\fontend\ServicesController;
use App\Http\Controllers\ManuContoller;
use App\Http\Controllers\TempImageControllerForPage;
use App\Models\BlogComments;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

// User pages backend

Route::get('/admin/users', [userContrller::class, 'index'])->name('admin.user.index')->middleware('is_admin');
Route::get('/admin/users/edit/{id}', [userContrller::class, 'edit'])->name('admin.user.edit')->middleware('is_admin');
Route::post('/admin/users/edit/{id}', [userContrller::class, 'update'])->name('admin.user.update')->middleware('is_admin');
Route::get('/admin/users/delete/{id}', [userContrller::class, 'delete'])->name('admin.user.delete')->middleware('is_admin');

// Service pages backend

Route::get('/admin/services/list', [adminServiceController::class, 'index'])->name('admin.service.index')->middleware('is_admin');
Route::get('/admin/services/create', [adminServiceController::class,'create'])->name('admin.service.create')->Middleware('is_admin');
Route::post('/admin/services/create', [adminServiceController::class,'save'])->name('admin.service.save')->Middleware('is_admin');
Route::get('/admin/services/edit/{id}',[adminServiceController::class, 'edit'])->name('admin.service.edit')->middleware('is_admin');
Route::post('/admin/services/edit/{id}',[adminServiceController::class, 'update'])->name('admin.service.update')->middleware('is_admin');
Route::get('/admin/services/delete/{id}',[adminServiceController::class, 'delete'])->name('admin.service.delete')->middleware('is_admin');
Route::post('/admin/temp/service/upload',[TempImageController::class,'upload'])->name('admin.service.temp')->middleware('is_admin');


// Blog pages backend

Route::get('/admin/blogs/list', [adminBlogController::class, 'index'])->name('admin.blog.index')->middleware('is_admin');
Route::get('/admin/blogs/create', [adminBlogController::class, 'create'])->name('admin.blog.create')->middleware('is_admin');
Route::post('/admin/blogs/save', [adminBlogController::class, 'save'])->name('admin.blog.save')->middleware('is_admin');
Route::get('/admin/blogs/edit/{id}', [adminBlogController::class, 'edit'])->name('admin.blog.edit')->middleware('is_admin');
Route::post('/admin/blogs/edit/{id}', [adminBlogController::class, 'update'])->name('admin.blog.update')->middleware('is_admin');
Route::get('/admin/blogs/delete/{id}', [adminBlogController::class, 'delete'])->name('admin.blog.delete')->middleware('is_admin');
Route::post('/admin/temp/blog/upload',[TempImageControllerForBlog::class,'upload'])->name('admin.blog.temp')->middleware('is_admin');

// Blog Comment Backend
Route::get('/admin/blogs/comment/list', [adminBlogController::class, 'commentIndex'])->name('admin.blog.comment')->middleware('is_admin');
Route::get('/admin/blogs/comment/edit/{id}', [adminBlogController::class, 'commentEdit'])->name('admin.blog.comment.edit')->middleware('is_admin');
Route::post('/admin/blogs/comment/edit/{id}', [adminBlogController::class, 'commentUpdate'])->name('admin.blog.comment.update')->middleware('is_admin');
Route::get('/admin/blogs/comment/delete/{id}', [adminBlogController::class, 'commentdelete'])->name('admin.blog.comment.delete')->middleware('is_admin');

// Faq Backend
Route::get('/admin/faq/list',[adminFaqController::class, 'index'])->name('admin.faq.index')->middleware('is_admin');
Route::get('/admin/faq/create',[adminFaqController::class, 'create'])->name('admin.faq.create')->middleware('is_admin');
Route::post('/admin/faq/save',[adminFaqController::class, 'save'])->name('admin.faq.save')->middleware('is_admin');
Route::get('/admin/faq/edit/{id}',[adminFaqController::class, 'edit'])->name('admin.faq.edit')->middleware('is_admin');
Route::post('/admin/faq/update/{id}',[adminFaqController::class, 'update'])->name('admin.faq.update')->middleware('is_admin');
Route::get('/adimin/faq/delete/{id}',[adminFaqController::class, 'delete'])->name('admin.faq.delete')->middleware('is_admin');


// Manage Pages Backend

Route::get('/admin/page/list', [adminPageController::class, 'index'])->name('admin.page.index')->middleware('is_admin');
Route::get('/admin/page/create', [adminPageController::class, 'create'])->name('admin.page.create')->middleware('is_admin');
Route::post('/admin/page/save', [adminPageController::class, 'save'])->name('admin.page.save')->middleware('is_admin');
Route::get('/admin/page/edit/{id}', [adminPageController::class, 'edit'])->name('admin.page.edit')->middleware('is_admin');
Route::post('/admin/page/update/{id}', [adminPageController::class, 'update'])->name('admin.page.update')->middleware('is_admin');
Route::get('/admin/page/delete/{id}', [adminPageController::class, 'delete'])->name('admin.page.delete')->middleware('is_admin');
Route::post('/admin/temp/page/upload',[AdminTempImageControllerForPage::class,'upload'])->name('admin.page.temp')->middleware('is_admin');


// Website Seeting
Route::get('/admin/setting/listedit', [SettingContoller::class, 'indexwithedit'])->name('admin.setting.indexwithedit')->middleware('is_admin');
// Route::get('/admin/setting/create', [SettingContoller::class, 'create'])->name('admin.setting.create')->middleware('is_admin');
Route::post('/admin/setting/save', [SettingContoller::class, 'save'])->name('admin.setting.save')->middleware('is_admin');


// Website Menu settings
Route::get('/admin/menu/list',[ManuContoller::class, 'index'])->name('admin.manu.list')->middleware('is_admin');
Route::get('/admin/menu/create',[ManuContoller::class, 'create'])->name('admin.manu.create')->middleware('is_admin');
Route::post('/admin/menu/save',[ManuContoller::class, 'save'])->name('admin.manu.save')->middleware('is_admin');
Route::get('/admin/menu/delete/{id}',[ManuContoller::class, 'delete'])->name('admin.manu.delte')->middleware('is_admin');
Route::post('/admin/menu/savesorted',[ManuContoller::class, 'savesorted'])->name('admin.manu.savesorted')->middleware('is_admin');


//...........end backend.........//



//Fontend pages

Route::get('/', [HomeController::class, 'index'])->name('fontend.home');
Route::get('/contact',[ContactController::class, 'index'])->name('fontend.contact');

// Service pages fontend.

Route::get('/service',[ServicesController::class, 'index'])->name('fontend.service');
Route::get('/service/detail/{id}',[ServicesController::class, 'detail'])->name('fontend.service.detail');


// Blog pages fontend.

Route::get('/blog',[BlogsController::class, 'index'])->name('fontend.blog');
Route::get('/blog/detail/{id}',[BlogsController::class, 'detail'])->name('fontend.blog.detail');
Route::post('/blog/savecomment', [BlogsController::class, 'savecomment'])->name('fontend.blog.commentsave');
Route::get('/blog/comment/show', [BlogsController::class, 'showcomment']);


// Faq pages fontend.

Route::get('/faq',[FaqController::class, 'index'])->name('fontend.faq');

// Manage Pages fontend.
// Route::get('/about',[AboutController::class, 'index'])->name('fontend.about');
Route::get('/about',[ManagePageContorller::class, 'about'])->name('fontend.about');
Route::get('/privacy',[ManagePageContorller::class, 'privacy'])->name('fontend.privacy');
Route::get('/terms',[ManagePageContorller::class, 'terms'])->name('fontend.terms');

// ..............End fontend...........//



Route::get('/welcome', function(){
    return view('welcome');
});



Route::get('/nointhiswebsite', function(){
    return view('notinthiswebsite.notinthiswebsite');
});
