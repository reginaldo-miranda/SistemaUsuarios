<?php

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
// route defaut

//use Illuminate\Routing\Route;

Route::get('/','usuariosController@index');

Route::get('/usuario_frm_recuperar_senha','usuariosController@frmRecupararSenha');

Route::get('/usuario_frm_criar_nova_conta','usuariosController@frmCriarNovaConta');