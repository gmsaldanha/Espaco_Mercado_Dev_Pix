<?php

use Illuminate\Support\Facades\Route;
use App\Http\Pix\PixController;
use App\Models\ContasBancarias\ContasModel;

Route::group(['middleware'=>['auth']], function(){  

});
Route::get('cadpsps', 'App\Http\Controllers\MeiosdePagamento\ContasBancarias\PspController@index')->name('cadpsps');


Route::get('savepsps', 'App\Http\Controllers\MeiosdePagamento\ContasBancarias\PspController@store')->name('savepsps');
Route::get('criapsps', 'App\Http\Controllers\MeiosdePagamento\ContasBancarias\PspController@create')->name('criapsps');
Route::get('atupsps/{id}', 'App\Http\Controllers\MeiosdePagamento\ContasBancarias\PspController@update')->name('atupsps');



Route::get('contas', 'App\Http\Controllers\MeiosdePagamento\ContasBancarias\ContasController@index')->name('contas');
Route::get('consultas', 'App\Http\Controllers\MeiosdePagamento\ContasBancarias\ContasController@consultas')->name('consultas');
Route::get('consultastoken', 'App\Http\Controllers\MeiosdePagamento\ContasBancarias\ContasController@consultastoken')->name('consultastoken');


Route::get('criacontas', 'App\Http\Controllers\MeiosdePagamento\ContasBancarias\ContasController@create')->name('criacontas');
Route::get('savecontas', 'App\Http\Controllers\MeiosdePagamento\ContasBancarias\ContasController@store')->name('savecontas');
Route::get('editcontas/{id}', 'App\Http\Controllers\MeiosdePagamento\ContasBancarias\ContasController@edit')->name('editcontas');
Route::get('atucontas/{id}', 'App\Http\Controllers\MeiosdePagamento\ContasBancarias\ContasController@update')->name('atucontas');
Route::get('delcontas/{id}', 'App\Http\Controllers\MeiosdePagamento\ContasBancarias\ContasController@destroy')->name('delcontas');



Route::get('/', function () {return view('home');}); 
Route::get('meiospag', 'App\Http\Controllers\MeiosdePagamento\MeiospagController@index')->name('meiospagindex');
Route::get('criacod', 'App\Http\Controllers\MeiosdePagamento\Pix\PixController@generatePix')->name('generatepix');
Route::get('variavelvalor', 'App\Http\Controllers\MeiosdePagamento\Pix\PixController@generatePix')->name('variavelvalor'); 


Route::get('consultastoken', 'App\Http\Controllers\MeiosdePagamento\Pix\PixController@endpointspix')->name('consultastoken');

Route::get('bb', 'App\Http\Controllers\MeiosdePagamento\MeiospagController@bb')->name('bb');
Route::get('cc', 'App\Http\Controllers\MeiosdePagamento\MeiospagController@cc')->name('cc');
Route::get('cd', 'App\Http\Controllers\MeiosdePagamento\MeiospagController@cd')->name('cd');
Route::get('mp', 'App\Http\Controllers\MeiosdePagamento\MeiospagController@mp')->name('mp');
Route::get('py', 'App\Http\Controllers\MeiosdePagamento\MeiospagController@py')->name('py');




Route::get('FinVenda', 'App\Http\Controllers\MeiosdePagamento\ContasBancarias\ContasController@finvenda')->name('FinVenda');

Route::get('Transacoes', 'App\Http\Controllers\MeiosdePagamento\ContasBancarias\ContasController@transacoes')->name('Transacoes');

Route::get('lancapix', 'App\Http\Controllers\MeiosdePagamento\ContasBancarias\PspController@lancapix')->name('lancapix');
Route::get('pixrecebidos', 'App\Http\Controllers\MeiosdePagamento\Pix\PixController@pixrecebidos')->name('pixrecebidos');

Auth::routes();