<?php

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


// Route::middleware([])->group(function () {

//     Route::namespace('Admin')->group(function (){

//         Route::prefix('admin')->group(function(){

//             Route::name('admin.')->group(function () {

//                 Route::get('/ti', 'TesteController@teste')->name('ti');

//                 Route::get('/rh', 'TesteController@teste')->name('rh');

//                 Route::get('/home', 'TesteController@teste')->name('home');

//                 Route::get('/', function () {
//                     return redirect()->route('admin.home');
//                 })->name('index');

//             });

//         });

//     });

// });

Route::group([
    'middleware' => [],
    'prefix' => 'admin',
    'namespace' => 'Admin'
], function () {

    Route::name('admin.')->group(function () {

        Route::get('/ti', 'TesteController@teste')->name('ti');

        Route::get('/rh', 'TesteController@teste')->name('rh');

        Route::get('/home', 'TesteController@teste')->name('home');

        Route::get('/', function () {
            return redirect()->route('admin.home');
        })->name('index');

    });

});

Route::get('/admin/dashboard', function() {
    return 'Home Admin';

    /**
     * Este middleware de autenticação, redireciona para a rotar login
     */

})->middleware('auth');

Route::get('/admin/financeiro', function() {
    return 'Home Admin';
})->middleware('auth');

Route::get('/admin/produtos', function() {
    return 'Home Admin';
})->middleware('auth');

Route::get('/login-url', function () {
    return 'Login';
})->name('login');


/**
 * Trabalhando rotas nomeadas
 */

Route::get('redirect3', function () {
    return redirect()->route('url.name');
});

Route::get('/name-url', function () {
    return 'hey hey hey';
})->name('url.name');


/**
 * Chamando uma view de maneira simplificada, apesar de não ser recomendado.
 */

Route::view('/view', 'welcome');

Route::get('/view', function () {
    return view('welcome');
});

/**
 * Quando eu acessar /redirect1, vou ser redirecionado para /redirect2
 */
Route::redirect('/redirect1', '/redirect2');

/**
 * Redirecionamento de rotas
 */

Route::get('redirect1', function () {
    return redirect('/redirect2');
});

Route::get('redirect2', function () {
    return "Redirect 02";
});

/**
 * Parametro opcional
 */

Route::get('/produtos/{idProduto?}', function ($idProduto = ""){
    return "Produtos {$idProduto}";
});

Route::get('/categorias/{flag}/posts', function ($flag) {
    return "Posts da categoria: {$flag}";
});

/**
 * Parametro obrigatorio
 */

Route::get('/categorias/{flag}', function ($parm1) {
    return "Progutos da categoria: {$parm1}";
});

Route::match(['get', 'post'],'/match', function() {
    return 'match';
});

/**
 * Permite todo tipo de acesso de verbo http
 */

Route::any('/any', function() {
    return 'any';
});

Route::get('/empresa', function () {
    return view('site.contact');
});

Route::get('/contato', function () {
    return 'Contato';
});

Route::get('/', function () {
    return view('welcome');
});
