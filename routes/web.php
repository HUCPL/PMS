<?php

use Illuminate\Support\Facades\Route;
require_once __DIR__ . '/admin.php';
use App\Http\Controllers\front\homeController;
use App\Http\Controllers\rentalys\indexController;
use App\Http\Controllers\rentalys\propertyList;
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
route::get('/cacheclear',function(){
   Artisan::Call('storage:link'); 
});
Route::get('/ren',[indexController::class,'index'])->name('indexPage');
Route::get('/',[homeController::class,'index'])->name('homePage');
Route::prefix('rentalys')->group(function () {
    Route::get('/properties',[propertyList::class,'propertyList'])->name('properties');
    Route::get('/about-us',[indexController::class,'aboutUS'])->name('aboutUS');
    Route::get('/agents',[indexController::class,'agents'])->name('agentsPage');
    Route::get('/blogs',[indexController::class,'Blog'])->name('blogsPage');
    Route::get('/contact',[indexController::class,'Contact'])->name('contactPage');
    Route::get('/compare',[indexController::class,'Compare'])->name('comparePage');
    Route::get('/wishlist',[indexController::class,'wishList'])->name('wishList');
    Route::get('/login',[indexController::class,'loginPage'])->name('rentalysLogin');
});
// Route::prefix('pms')->group(function(){
// });
