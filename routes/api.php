<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\RecipeController;
use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\API\SpecialEventsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login'])->name('login');

Route::post('addAdmins', [AdminController::class, 'register']);

Route::get('products/{id}', [ProductController::class, 'show'], function (Request $id) {
    return 'Products '.$id;
});


Route::get('Recipe/{id}', [RecipeController::class, 'show'], function (Request $id) {
    return 'Recipe '.$id;
});



Route::middleware(['auth', 'isAdmin'])->get('/admin', function () {
    Route::post('/addProducts', [ProductController::class, 'store']);
    Route::delete('/deleteProducts/{id}', [ProductController::class, 'destroy']);  
    
    Route::post('/addRecipe', [RecipeController::class, 'store']);
    Route::put('/updateRecipe/{id}', [RecipeController::class, 'update'], function (Request $id) {
        return 'Recipe '.$id;
    });
    Route::delete('/deleteRecipe/{id}', [RecipeController::class, 'destroy']);

    

    Route::post('/addEvent', [SpecialEventsController::class, 'store']);
    Route::get('event/{id}', [SpecialEventsController::class, 'show'], function (Request $id) {
        return 'Events '.$id;
    });
    Route::put('/updateEvent/{id}', [SpecialEventsController::class, 'update'], function (Request $id) {
        return 'Recipe '.$id;
    });
    Route::delete('/deleteEvent/{id}', [SpecialEventsController::class, 'destroy']);  
    

});