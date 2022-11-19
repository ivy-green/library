<?php


use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

use App\Http\Controllers\BooksController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\SignBorrowController;
use App\Http\Controllers\GiveBackController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ViolationsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\RulesController;
use App\Http\Controllers\AccessesController;
use App\Http\Controllers\Auth\LoginController;



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

Route::get('/login', [LoginController::class, 'getLogin']);
Route::post('/login', [LoginController::class, 'postLogin']);
Route::get('/logout', [LoginController::class, 'getLogout']);

Route::get('/', function () {
    return Inertia::render('home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::get('/', function() {
    return redirect('/login');
});

// Route::group(['middleware' => 'checkAdminLogin', 'prefix' => 'admincp', 'namespace' => 'Admin'], function() {
// 	Route::get('/', function() {
// 		return view('admin.home');
// 	});
// });


// Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::resource('/books', BooksController::class)->missing(function (Request $request) {
    return Redirect::route('management.librarian.books.index');
});


Route::resource('/user', UserController::class)->missing(function (Request $request) {
    return Redirect::route('management.user.index');
});

Auth::routes();

Route::get('/home', [PagesController::class, 'home'])->name('home');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');

Auth::routes();

Route::get('/exchange', function(){
    return view('management.librarian.exchange.index');
});
Route::resource('/exchange/giveback', GiveBackController::class)->missing(function (Request $request) {
    return Redirect::route('management.librarian.giveback.index');
});
Route::resource('/exchange/borrow', BorrowController::class)->missing(function (Request $request) {
    return Redirect::route('management.librarian.borrow.index');
});
Route::resource('/exchange/signborrow', SignBorrowController::class)->missing(function (Request $request) {
    return Redirect::route('management.librarian.signborrow.index');
});

Auth::routes();

Route::resource('/authors', AuthorsController::class)->missing(function (Request $request) {
    return Redirect::route('management.librarian.authors.index');
});

Route::resource('/categories', CategoriesController::class)->missing(function (Request $request) {
    return Redirect::route('management.librarian.categories.index');
});

Route::resource('/violations', ViolationsController::class)->missing(function (Request $request) {
    return Redirect::route('management.librarian.violations.index');
});

// admin
//rules
Route::resource('/rules', RulesController::class)->missing(function (Request $request) {
    return Redirect::route('management.rules.index');
});

Route::resource('/accesses', AccessesController::class)->missing(function (Request $request) {
    return Redirect::route('management.admin.accesses.index');
});


// reader
Route::get('/personal/edit', function(){
    return view('personal.edit');
});

Route::get('/personal/infor', function(){
    return view('personal.infor');
});