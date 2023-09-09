<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\EmployéeController;
use App\Http\Controllers\FornisseurController;
use App\Http\Controllers\LieuStockController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StockEnierController;
use App\Models\departement;
use App\Models\Employée;
use App\Models\Product;
use App\Models\StockEnier;
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
Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/login',[LoginController::class,'loginAction'])->name('loginAction');
Route::middleware(['auth'])->group(function () {
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::get('/',[ProfileController::class,'index'])->name('profiles.index');
Route::prefix('profiles')->group(function () {
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/','index')->name('profiles.index');
        Route::post('/','store')->name('profile.store');
        Route::get('/{profile}/edit','edit')->name('profile.edit');
        Route::put('/{profile}','editAction')->name('profile.editAction');
        Route::delete('/{profile}','destroy')->name('profile.destroy');
        Route::get('/profile','profile')->name('profile');

    });

});
Route::resource('departement',DepartementController::class);

Route::resource('stockslieu',LieuStockController::class);
Route::resource('products',ProductController::class);
Route::get('/add-to-cart/{product}',[ProductController::class,'addToCart'])->name('add-to-cart');
Route::get('/panier',[ProductController::class,'panier'])->name('panier');
Route::delete('/panier/{Id}',[ProductController::class,'removeFromCart'])->name('remove-from-cart');
Route::post('/confirm-cart',[ProductController::class,'confirmCart'])->name('confirm-cart');
Route::get('allDemande',[DemandeController::class,'mesdemande'])->name('mesDemande');
Route::resource('fornisseurs',FornisseurController::class);
Route::resource('categories',CategoryController::class);
Route::resource('stockenier',StockEnierController::class);
Route::resource('demandes',DemandeController::class);
Route::get('/home',function () {
   return view('index');
})->name('home');


});
Route::get('/employées',[EmployeController::class,'index'])->name('employées.index');
Route::get('/employées/create',[EmployeController::class,'create'])->name('employes.create');
Route::post('/employées',[EmployeController::class,'store'])->name('employes.store');
Route::delete('/employes/{id}',[EmployeController::class,'destroy'])->name('employes.destroy');
Route::get('/employes/{id}/edit',[EmployeController::class,'edit'])->name('employes.edit');
Route::put('employes/{id}',[EmployeController::class,'update'])->name('employes.update');


Route::get('/user/demandes',[EmployeController::class,'mesdemandes'])->name('demandes.user');
Route::get('accepter/demande/{id}',[DemandeController::class,'accepter'])->name('demandes.accepter');
Route::get('resetpassword/{hash}',[LoginController::class,'verify'])->name('verify');
Route::post('resetpassword',[LoginController::class,'reset'])->name('reset');
Route::get('resetpassword',[LoginController::class,'send'])->name('send');
// Route::get('reset/user',[LoginController::class,'sender'])->name('sender');

