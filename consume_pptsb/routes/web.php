<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CabangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RegionalController;
use App\Http\Controllers\SektorController;

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
// routes/web.php

// Route::get('/login', [AuthController::class,'showLoginForm'])->name('login.show');
// Route::post('/login', [AuthController::class, 'login'])->name('login');
// Route::get('/register', [AuthController::class,'showRegistrationForm'])->name('register.show');
// Route::post('/register', [AuthController::class,'register'])->name('register');
// Route::post('/logout', [AuthController::class,'logout'])->name('logout');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.show');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.show');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware(['App\Http\Middleware\Authenticate'])->group(function () {
    // ------- Cabang ----------
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/cabang/', [CabangController::class, 'getCabangApi'])->name('cabang');
    Route::get('/addcabang/', [CabangController::class, 'showAdd'])->name('cabang.add');
    Route::post('/postcabang', [CabangController::class, 'addCabang'])->name('cabang.post');
    Route::get('/editcabang/{id}', [CabangController::class, 'showUpdate'])->name('cabang.edit');
    Route::put('/updatecabang/{id}', [CabangController::class, 'updateCabang'])->name('cabang.update');
    Route::delete('/cabang/{id}', [CabangController::class, 'deleteCabang'])->name('cabang.destroy');

    // ------- Regional ------------

    Route::get('/regional/', [RegionalController::class, 'getRegionalApi'])->name('regional');
    Route::get('/addregional/', [RegionalController::class, 'showAdd'])->name('regional.add');
    Route::post('/postregional', [RegionalController::class, 'addRegional'])->name('regional.post');
    Route::get('/editregional/{id}', [RegionalController::class, 'showUpdate'])->name('regional.edit');
    Route::put('/updateregional/{id}', [RegionalController::class, 'updateRegional'])->name('regional.update');
    Route::delete('/regional/{id}', [RegionalController::class, 'deleteRegional'])->name('regional.destroy');


    // --------- Sektor ------------

    Route::get('/sektor/', [SektorController::class, 'getSektorApi'])->name('sektor');
    Route::get('/addsektor/', [SektorController::class, 'showAdd'])->name('sektor.add');
    Route::post('/postsektor', [SektorController::class, 'addSektor'])->name('sektor.post');
    Route::get('/editsektor/{id}', [SektorController::class, 'showUpdate'])->name('sektor.edit');
    Route::put('/updatesektor/{id}', [SektorController::class, 'updateSektor'])->name('sektor.update');
    Route::delete('/sektor/{id}', [SektorController::class, 'deleteSektor'])->name('sektor.destroy');
});
