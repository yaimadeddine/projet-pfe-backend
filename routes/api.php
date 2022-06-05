<?php

use App\Http\Controllers\ContratController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\FournitureController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\MaterielController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\TypeFournitureController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Create Method

Route::post('/create/contrat', [ContratController::class, 'store']);
Route::post('/create/fournisseur', [FournisseurController::class, 'store']);
Route::post('/create/marque', [MarqueController::class, 'store']);
Route::post('/create/materiel', [MaterielController::class, 'store']);
Route::post('/create/post', [PostController::class, 'store']);
Route::post('/create/salle', [SalleController::class, 'store']);
Route::post('/create/service', [ServiceController::class, 'store']);
Route::post('/create/ticket', [TicketController::class, 'store']);
Route::post('/create/type', [TypeController::class, 'store']);
Route::post('/create/user', [UserController::class, 'store']);
Route::post('/create/fourniture', [FournitureController::class, 'store']);
Route::post('/create/typefourniture', [TypeFournitureController::class, 'store']);


// List

Route::get('/contrat/list', [ContratController::class, 'findAll']);
Route::get('/fournisseur/list', [FournisseurController::class, 'findAll']);
Route::get('/marque/list', [MarqueController::class, 'findAll']);
Route::get('/materiel/list', [MaterielController::class, 'findAll']);
Route::get('/post/list', [PostController::class, 'findAll']);
Route::get('/salle/list', [SalleController::class, 'findAll']);
Route::get('/service/list', [ServiceController::class, 'findAll']);
Route::get('/ticket/list', [TicketController::class, 'findAll']);
Route::get('/type/list', [TypeController::class, 'findAll']);
Route::get('/user/list', [UserController::class, 'findAll']);
Route::get('/fourniture/list', [FournitureController::class, 'findAll']);
Route::get('/typefourniture/list', [TypeFournitureController::class, 'findAll']);



// Count
Route::get('/service/count', [ServiceController::class, 'findCount']);
Route::get('/fournisseur/count', [FournisseurController::class, 'findCount']);
Route::get('/salle/count', [SalleController::class, 'findCount']);
Route::get('/post/count', [PostController::class, 'findCount']);
Route::get('/marque/count', [MarqueController::class, 'findCount']);
Route::get('/type/count', [TypeController::class, 'findCount']);
Route::get('/materiel/count', [MaterielController::class, 'findCount']);
Route::get('/contrat/count', [ContratController::class, 'findCount']);
Route::get('/fourniture/count', [FournitureController::class, 'findCount']);
Route::get('/typefourniture/count', [TypeFournitureController::class, 'findCount']);
Route::get('/user/count', [UserController::class, 'findCount']);
Route::get('/ticket/count', [TicketController::class, 'findCount']);




// update

Route::post('/update/service/{id}', [ServiceController::class, 'update']);
Route::post('/update/fournisseur/{id}', [FournisseurController::class, 'update']);
Route::post('/update/salle/{id}', [SalleController::class, 'update']);
Route::post('/update/post/{id}', [PostController::class, 'update']);
Route::post('/update/marque/{id}', [MarqueController::class, 'update']);
Route::post('/update/type/{id}', [TypeController::class, 'update']);
Route::post('/update/materiel/{id}', [MaterielController::class, 'update']);
Route::post('/update/contrat/{id}', [ContratController::class, 'update']);
Route::post('/update/fourniture/{id}', [FournitureController::class, 'update']);
Route::post('/update/typefourniture/{id}', [TypeFournitureController::class, 'update']);





// Delete
Route::delete('/delete/service/{id}',[ServiceController::class, 'delete']);
Route::delete('/delete/fournisseur/{id}',[FournisseurController::class, 'delete']);
Route::delete('/delete/salle/{id}',[SalleController::class, 'delete']);
Route::delete('/delete/post/{id}',[PostController::class, 'delete']);
Route::delete('/delete/marque/{id}',[MarqueController::class, 'delete']);
Route::delete('/delete/type/{id}',[TypeController::class, 'delete']);
Route::delete('/delete/materiel/{id}',[MaterielController::class, 'delete']);
Route::delete('/delete/contrat/{id}',[ContratController::class, 'delete']);
Route::delete('/delete/fourniture/{id}',[FournitureController::class, 'delete']);
Route::delete('/delete/typefourniture/{id}',[TypeFournitureController::class, 'delete']);



// find with list
Route::get('/contrat/materiel/list', [ContratController::class, 'findList']);







// update picture
Route::post('/updatepicture', [UserController::class, 'updatePicture']);







// Login

Route::post('/login', [UserController::class, 'login']);



//Logout

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [UserController::class, 'logout']);
});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
