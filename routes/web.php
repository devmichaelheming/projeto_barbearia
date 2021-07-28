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

Route::get('/', 'HomeController@index')->name('index');

Route::get('/login', 'LoginController@index')->name('index.login');

Route::post('/login/save', 'LoginController@save')->name('save.login');

Route::get('/register', 'LoginController@register')->name('index.register');

Route::post('/register/save', 'LoginController@register_save')->name('save.register');

Route::get('/logout', 'LoginController@logout')->name('logout.login');

Route::get('/avatar/{id}', 'LoginController@editarAvatar')->name('avatar.editar');

Route::post('/avatar/editar/{id}', 'LoginController@avatar')->name('avatar.save');

// LOGIN PELO FACEBOOK

Route::get('/login/facebook', 'SocialiteController@redirectToProvider_facebook')->name('login.facebook');

Route::get('/login/facebook/callback', 'SocialiteController@handleProviderCallback_facebook');

// LOGIN PELO GOOGLE

Route::get('/login/google', 'SocialiteController@redirectToProvider')->name('login.google');

Route::get('/login/google/callback', 'SocialiteController@handleProviderCallback');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::prefix('/admin')->group(function () {

    Route::get('/', 'admin\adminController@index')->name('admin');
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::get('/login', 'Auth\LoginController@login');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('/register', 'Auth\RegisterController@register');

    // Password Reset Routes...
    Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('/password/reset', 'Auth\ResetPasswordController@reset');

    Route::get('/home', 'admin\adminController@home')->name('admin.home');

    // ------------- // ------------- // ------------- // ------------- // ------------- // ------------- // ------------- // -------------

    // Index usuários
    Route::get('/usuarios', 'admin\UsuariosController@index')->name('admin.usuarios');

    // Index cadastrar usuários
    Route::get('/usuarios/viewCadastrar', 'admin\UsuariosController@viewCadastrar')->name('usuarios.viewCadastrar');
    Route::post('/usuarios/cadastrar', 'admin\UsuariosController@cadastrar')->name('usuarios.cadastrar');

    // Index editar usuários
    Route::get('/usuarios/editar/{id}', 'admin\UsuariosController@editar')->name('usuarios.editar');
    Route::post('/usuarios/editar/save/{id}', 'admin\UsuariosController@editarSalvar')->name('usuarios.editarSalvar');

    // Index remover usuários
    Route::get('/usuarios/confirm/{id}', 'admin\UsuariosController@confirm')->name('usuarios.confirm');
    Route::get('/usuarios/remover/{id}', 'admin\UsuariosController@remover')->name('usuarios.remover');

    // ------------- // ------------- // ------------- // ------------- // ------------- // ------------- // ------------- // -------------

    // Index clientes
    Route::get('/clientes', 'admin\clientesController@index')->name('admin.clientes');

    // Index cadastrar clientes
    Route::get('/clientes/viewCadastrar', 'admin\clientesController@viewCadastrar')->name('clientes.viewCadastrar');

    Route::post('/clientes/cadastrar', 'admin\clientesController@cadastrar')->name('clientes.cadastrar');

    // Index editar clientes
    Route::get('/clientes/editar/{id}', 'admin\clientesController@editar')->name('clientes.editar');

    Route::post('/clientes/editar/save/{id}', 'admin\clientesController@editarSalvar')->name('clientes.editarSalvar');

    // Index remover clientes
    Route::get('/clientes/confirm/{id}', 'admin\clientesController@confirm')->name('clientes.confirm');
    Route::get('/clientes/remover/{id}', 'admin\clientesController@remover')->name('clientes.remover');

    // ------------- // ------------- // ------------- // ------------- // ------------- // ------------- // ------------- // -------------

    // Index serviços
    Route::get('/servicos', 'admin\servicosController@index')->name('admin.servicos');

    // Index cadastrar serviços
    Route::get('/servicos/viewCadastrar', 'admin\servicosController@viewCadastrar')->name('servicos.viewCadastrar');
    Route::post('/servicos/cadastrar', 'admin\servicosController@cadastrar')->name('servicos.cadastrar');

    // Index editar serviços
    Route::get('/servicos/editar/{id}', 'admin\servicosController@editar')->name('servicos.editar');
    Route::post('/servicos/editar/save/{id}', 'admin\servicosController@editarSalvar')->name('servicos.editarSalvar');

    // Index remover serviços
    Route::get('/servicos/confirm/{id}', 'admin\servicosController@confirm')->name('confirm');
    Route::get('/servicos/remover/{id}', 'admin\servicosController@remover')->name('servicos.remover');

    // ------------- // ------------- // ------------- // ------------- // ------------- // ------------- // ------------- // -------------

    // Index agendamentos
    Route::get('/agendamentos', 'admin\agendamentoController@index')->name('admin.agendamentos');

    // Index cadastrar agendamentos
    Route::get('/agendamentos/viewCadastrar', 'admin\agendamentoController@viewCadastrar')->name('agendamentos.viewCadastrar');
    Route::post('/agendamentos/cadastrar', 'admin\agendamentoController@cadastrar')->name('agendamentos.cadastrar');

    // Index ver mais
    Route::get('/agendamentos/vermais/{id}', 'admin\agendamentoController@vermais')->name('agendamentos.vermais');

    // Index editar agendamentos
    Route::get('/agendamentos/editar/{id}', 'admin\agendamentoController@editar')->name('agendamentos.editar');
    Route::post('/agendamentos/editar/save/{id}', 'admin\agendamentoController@editarSalvar')->name('agendamentos.editarSalvar');

    // Index remover agendamentos
    Route::get('/agendamentos/confirm/{id}', 'admin\agendamentoController@confirm')->name('agendamentos.confirm');
    Route::get('/agendamentos/remover/{id}', 'admin\agendamentoController@remover')->name('agendamentos.remover');
    Route::get('/agendamentos/servicos/deletar/{id}', 'admin\agendamentoController@removerServico')->name('servicoAgendamento.remover');
});