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
use App\Http\Controllers\ExchangeController;
use App\Http\Controllers\ReportController;
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

// Route::get('/login', [LoginController::class, 'getLogin']);
// Route::post('/login', [LoginController::class, 'postLogin']);
// Route::get('/logout', [LoginController::class, 'getLogout']);

Route::get('/', function () {
    return Inertia::render('home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/manage', function () {
    return view('management.index');
})->name('manage');

Route::controller(PagesController::class)->group(function () {
    Route::get('/home', 'home');
    Route::get('/rule', 'rule');
    Route::get('/notify', 'pages.notify')->name('notify');
    Route::get('/contact', 'contact');
});

// Route::group(['middleware' => 'checkAdminLogin', 'prefix' => 'admincp', 'namespace' => 'Admin'], function() {
// 	Route::get('/', function() {
// 		return view('admin.home');
// 	});
// });


// Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/books/checkExists', [BooksController::class, 'checkExists'])
    ->name('books.checkExists');

Route::resource('/manage/books', BooksController::class)->missing(function (Request $request) {
    return Redirect::route('management.librarian.books.index');
})->names([
    'index' => 'books'
]);

Route::resource('/user/books', BooksController::class)->missing(function (Request $request) {
    return Redirect::route('management.librarian.books.index');
})->names([
    'index' => 'userbooks'
]);


Route::resource('/manage/user', UserController::class)->missing(function (Request $request) {
    return Redirect::route('management.user.index');
})->names([
    'index' => 'user',
    'show' => 'user.show',
    'create' => 'user.create',
]);

Route::controller(UserController::class)->group(function () {
    Route::post('/user/import', 'import');
});

Auth::routes();

Route::get('/home', [PagesController::class, 'home'])->name('home');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');

Auth::routes();

// Route::get('/exchange', function(){
//     return view('management.librarian.exchange.index');
// })->name('exchange');

Route::resource('/manage/exchange', ExchangeController::class)->missing(function (Request $request) {
    return Redirect::route('management.librarian.exchange.index');
})->names([
    'index' => 'exchange'
]);

Route::resource('/exchange/giveback', GiveBackController::class)->missing(function (Request $request) {
    return Redirect::route('management.librarian.exchange.giveback.index');
})->names([
    'index' => 'giveback'
]);

//

// Route::get('/exchange/borrow', [BorrowController::class, 'index'])
//     ->name('borrow');

Route::resource('/manage/borrow', BorrowController::class)->missing(function (Request $request) {
    return Redirect::route('management.librarian.exchange.borrow.index');
})->names([
    'index' => 'borrow',
    'create' => 'borrow.create',
    'show' => 'borrow.show'
]);

Route::resource('/manage/signborrow', SignBorrowController::class)->missing(function (Request $request) {
    return Redirect::route('management.librarian.exchange.signborrow.index');
})->names([
    'index' => 'signborrow',
    'create' => 'signborrow.create',
    'show' => 'signborrow.show'
]);

Route::resource('/manage/report', ReportController::class)->missing(function (Request $request) {
    return Redirect::route('management.librarian.report.index');
})->names([
    'index' => 'report',
    'show' => 'report.show',
    'create' => 'report.create',
    'edit' => 'report.edit'
]);

Auth::routes();

Route::resource('/manage/authors', AuthorsController::class)->missing(function (Request $request) {
    return Redirect::route('management.librarian.authors.index');
})->names([
    'index' => 'authors',
    'show' => 'authors.show',
]);

Route::resource('/manage/categories', CategoriesController::class)->missing(function (Request $request) {
    return Redirect::route('management.librarian.categories.index');
})->names([
    'index' => 'categories',
    'show' => 'categories.show',
    'create' => 'categories.create',
]);

Route::resource('/manage/violations', ViolationsController::class)->missing(function (Request $request) {
    return Redirect::route('management.librarian.violations.index');
})->names([
    'index' => 'violations',
    'show' => 'violations.show',
    'create' => 'violations.create',
    'edit' => 'violations.edit',
]);

// admin
//rules
Route::resource('/rules', RulesController::class)->missing(function (Request $request) {
    return Redirect::route('management.rules.index');
})->names([
    'index' => 'rules'
]);

Route::resource('/accesses', AccessesController::class)->missing(function (Request $request) {
    return Redirect::route('management.admin.accesses.index');
});


// reader
Route::get('/personal/edit', function () {
    return view('personal.edit');
});

Route::get('/personal/infor', function () {
    return view('personal.infor');
});
