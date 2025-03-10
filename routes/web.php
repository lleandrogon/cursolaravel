<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\CheckEmail;
use App\Http\Controllers\UserController;

Route::resource('produtos', ProdutoController::class);

Route::resource('users', UserController::class);

Route::get('/', [SiteController::class, 'index'])->name('site/index');

Route::get('/produto/{slug}', [SiteController::class, 'details'])->name('site/details');

Route::get('/categoria/{id}', [SiteController::class, 'categoria'])->name('site/categoria');

Route::get('/carrinho', [CarrinhoController::class, 'carrinhoLista'])->name('site/carrinho');

Route::post('/carrinho', [CarrinhoController::class, 'adicionaCarrinho'])->name('site/addcarrinho');

Route::post('/remover', [CarrinhoController::class, 'removeCarrinho'])->name('site/removecarrinho');

Route::post('/atualizar', [CarrinhoController::class, 'atualizaCarrinho'])->name('site/atualizacarrinho');

Route::get('/limpar', [CarrinhoController::class, 'limparCarrinho'])->name('site/limparcarrinho');

Route::view('/login', 'login/form')->name('login/form');

Route::post('/auth', [LoginController::class, 'auth'])->name('login/auth');

Route::get('/logout', [LoginController::class, 'logout'])->name('login/logout');

Route::get('/register', [LoginController::class, 'create'])->name('login/create');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin/dashboard')->middleware([Authenticate::class, CheckEmail::class]);

/*

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.' 
], function() {
    Route::get('dashboard', function() {
        return "dashboard";
    })->name('dashboard');
    
    Route::get('users', function() {
        return "users";
    })->name('users');
    
    Route::get('clientes', function() {
        return "clientes";
    })->name('clientes');
});

Route::any('/any', function() {
    return "Permite todo tipo de acesso http (put, delete, get, post)";
});

Route::match(['put', 'delete'], '/match', function() {
    return "Permite apenas acessos definidos";
});

Route::get('/produto/{id}/{cat?}', function($id, $cat = '') {
    return "O id do produto é: " . $id . "<br>" . "A categoria é: " . $cat;
});

Route::redirect('/sobre', '/empresa');
Route::view('/empresa', 'site/empresa');

Route::get('/timesnownews', function() {
    return view('news');
})->name('noticias');

Route::get('/novidades', function() {
    return redirect()->route('noticias');
});

*/