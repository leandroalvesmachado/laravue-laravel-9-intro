<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

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

// Route::get('/request', function (\Illuminate\Http\Request $request) {
//     $r = $request->all();
//     $header = $request->header();
//     return $r;
// });

// // model bind busca por pk
// Route::get('user/{user}', function (\App\Models\User $user) {
//     return $user;
// });

// // model bind com busca por campo, usou o email no caso
// Route::get('user/{user:email}', function (\App\Models\User $user) {
//     return $user;
// });

// Route::get('/hello-world', function () {
//     return 'oi';
// });


// Route::get('/users/{id}', function ($id) {
//     return $id;
// });

// Route::get('/users/{paramA}/{paramB}', function ($paramA, $paramB) {
//     return $paramA.' - '.$paramB;
// });

// // opcional
// Route::get('/a-empresa/{string?}', function ($string = null) {
//     return $string;
// })->name('a-empresa');

// Route::prefix('usuarios')->group(function() {
//     Route::get('', function() {
//         return 'usuários';
//     })->name('usuarios');

//     Route::get('/{id}', function() {
//         return 'Mostrar detalhes';
//     })->name('usuarios.show');


//     Route::get('/{id}/tags', function() {
//         return 'Tags do usuário';
//     })->name('usuarios.tags');
// });

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');
