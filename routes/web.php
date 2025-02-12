<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ESewaController;

Route::get('/',[HomeController::class,'index']);

Route::middleware(['auth:sanctum', 'verified'])->get('/
        dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

Route::get('/redirect',[HomeController::class,'redirect']);
Route::get('/products',[HomeController::class,'products']);
Route::get('/blog',[HomeController::class,'blog']);
Route::get('/contact',[HomeController::class,'contact']);

/*sub nav*/
Route::get('/orders',[HomeController::class,'orders']);
Route::get('/chats',[HomeController::class,'chats']);
/* catagorise */
Route::get('/lipstick',[HomeController::class,'lipstick']);
Route::get('/bronzer',[HomeController::class,'bronzer']);
Route::get('/concealer',[HomeController::class,'concealer']);
Route::get('/Eyeliner',[HomeController::class,'Eyeliner']);
Route::get('/Eyeshadow',[HomeController::class,'Eyeshadow']);
Route::get('/foundation',[HomeController::class,'foundation']);
Route::get('/moisturizer',[HomeController::class,'moisturizer']);
Route::get('/primer',[HomeController::class,'primer']);

/*product_details*/
Route::get('/product_detail',[HomeController::class,'product']);
/*cart*/
Route::get('/cart',[HomeController::class,'cart']);
/*addToCard post method */
Route::post('/add_To_Cart', [HomeController::class, 'add_To_Cart'])->name('addToCard');
Route::post('/updateCarts/{id}', [HomeController::class, 'updateCarts']);
Route::get('/checkout', [HomeController::class, 'checkout']);
/*cart delete */
Route::get('/deleteCartItem/{id}',[HomeController::class,'deleteCartItem']);


/*admin*/
Route::get('/admin',[HomeController::class,'admin']);
Route::get('/adminproduct',[HomeController::class,'adminproduct']);

Route::post('/AddNewProduct',[HomeController::class,'AddNewProduct']);


/*esewa controller*/


Route::get('/success', [ESewaController::class, 'paymentSuccess']);
Route::get('/failure', [ESewaController::class, 'paymentFailure']);
Route::put('/esewa', [ESewaController::class, 'esewaPay'])->name('esewa');