<?php

use Illuminate\Support\Facades\Route;
use App\Http\Pix\PixController;
use App\Models\ContasBancarias\ContasModel;
use App\Http\Fretes\CotacaoController;


use \GuzzleHttp\Psr7;
use \GuzzleHttp\Exception\RequestException;
use \GuzzleHttp\Client;


Route::group(['middleware'=>['auth']], function(){  

});



Route::get('consultas', 'App\Http\Controllers\MeiosdePagamento\ContasBancarias\ContasController@consultas')->name('consultas');
Route::get('consultastoken', 'App\Http\Controllers\MeiosdePagamento\ContasBancarias\ContasController@consultastoken')->name('consultastoken');

//Route::resource('criacontas', 'ContasController');
Route::get('contas', 'App\Http\Controllers\MeiosdePagamento\ContasBancarias\ContasController@index')->name('contas');
Route::get('criacontas', 'App\Http\Controllers\MeiosdePagamento\ContasBancarias\ContasController@create')->name('criacontas');
Route::get('savecontas', 'App\Http\Controllers\MeiosdePagamento\ContasBancarias\ContasController@store')->name('savecontas');
Route::get('editcontas/{id}', 'App\Http\Controllers\MeiosdePagamento\ContasBancarias\ContasController@edit')->name('editcontas');
Route::put('atucontas/{id}', 'App\Http\Controllers\MeiosdePagamento\ContasBancarias\ContasController@update')->name('atucontas');
Route::get('delcontas/{id}', 'App\Http\Controllers\MeiosdePagamento\ContasBancarias\ContasController@destroy')->name('delcontas');


Route::get('transportadoras', 'App\Http\Controllers\Fretes\TransportadoraController@index')->name('transportadoras');
Route::get('criatransportadora', 'App\Http\Controllers\Fretes\TransportadoraController@create')->name('criatransportadora');
Route::get('savetransportadora', 'App\Http\Controllers\Fretes\TransportadoraController@store')->name('savetransportadora');
Route::get('edittransportadora/{id}', 'App\Http\Controllers\Fretes\TransportadoraController@edit')->name('edittransportadora');
Route::put('atutransportadora/{id}', 'App\Http\Controllers\Fretes\TransportadoraController@update')->name('atutransportadora');
Route::get('deltransportadora/{id}', 'App\Http\Controllers\Fretes\TransportadoraController@destroy')->name('deltransportadora');




Route::get('psps', 'App\Http\Controllers\MeiosdePagamento\ContasBancarias\PspController@index')->name('psps');
Route::get('criapsps', 'App\Http\Controllers\MeiosdePagamento\ContasBancarias\PspController@create')->name('criapsps');
Route::get('savepsps', 'App\Http\Controllers\MeiosdePagamento\ContasBancarias\PspController@store')->name('savepsps');
Route::get('editpsp/{id}', 'App\Http\Controllers\MeiosdePagamento\ContasBancarias\PspController@edit')->name('editpsp');
Route::put('atupsps/{id}', 'App\Http\Controllers\MeiosdePagamento\ContasBancarias\PspController@update')->name('atupsps');
Route::get('delpsps/{id}', 'App\Http\Controllers\MeiosdePagamento\ContasBancarias\PspController@destroy')->name('delpsps');
Route::get('locpsps', 'App\Http\Controllers\MeiosdePagamento\ContasBancarias\PspController@index')->name('locpsps');



Route::get('/', function () {return view('home');}); 
Route::get('meiospag', 'App\Http\Controllers\MeiosdePagamento\MeiospagController@index')->name('meiospagindex');
Route::get('criacod', 'App\Http\Controllers\MeiosdePagamento\Pix\PixController@generatePix')->name('generatepix');
Route::get('qrcodedinamicosafe2pay', 'App\Http\Controllers\MeiosdePagamento\Pix\PixController@qrcodedinamicosafe2pay')->name('qrcodedinamicosafe2pay');


Route::get('variavelvalor', 'App\Http\Controllers\MeiosdePagamento\Pix\PixController@qrcodedinamicosafe2pay')->name('variavelvalor'); 


Route::get('consultastoken', 'App\Http\Controllers\MeiosdePagamento\Pix\PixController@endpointspix')->name('consultastoken');

Route::get('bb', 'App\Http\Controllers\MeiosdePagamento\MeiospagController@bb')->name('bb');
Route::get('cc', 'App\Http\Controllers\MeiosdePagamento\MeiospagController@cc')->name('cc');
Route::get('cd', 'App\Http\Controllers\MeiosdePagamento\MeiospagController@cd')->name('cd');
Route::get('consultatransacoes', 'App\Http\Controllers\MeiosdePagamento\MeiospagController@consultatransacoes')->name('consultatransacoes');
Route::get('consultatodastransacoes', 'App\Http\Controllers\MeiosdePagamento\MeiospagController@consultatodastransacoes')->name('consultatodastransacoes');




Route::get('FinVenda', 'App\Http\Controllers\MeiosdePagamento\ContasBancarias\ContasController@finvenda')->name('FinVenda');
Route::get('Transacoes', 'App\Http\Controllers\MeiosdePagamento\ContasBancarias\ContasController@transacoes')->name('Transacoes');
Route::get('lancapix', 'App\Http\Controllers\MeiosdePagamento\ContasBancarias\PspController@lancapix')->name('lancapix');
Route::get('pixrecebidos', 'App\Http\Controllers\MeiosdePagamento\Pix\PixController@pixrecebidos')->name('pixrecebidos');




//Fretes
Route::get('cotacao', 'App\Http\Controllers\Fretes\CotacaoController@cotacao')->name('cotacao');
Route::get('lista_cotacoes/', 'App\Http\Controllers\Fretes\CotacaoController@lista_cotacoes')->name('lista_cotacoes');
Route::get('cotacaovenda', 'App\Http\Controllers\Fretes\CotacaoController@cotacao')->name('cotacao');


Route::get('callback', 'App\Http\Controllers\Fretes\TransportadoraController@callback')->name('callback');
Route::get('fretemelhorenvio', 'App\Http\Controllers\Fretes\TransportadoraController@fretemelhorenvio')->name('fretemelhorenvio');
Route::get('/fretes/callback/callbackret', function () {return view('/fretes/callback.callbackret');})->name('callbackret'); 



/** Apontando Post para o Controlador */
//Route::post('api/quote/', 'App\Http\Controllers\Fretes\CotacaoController@quote')->name('quote');
$router->get('api/quote/', 'App\Http\Controllers\Fretes\CotacaoController@quotar');
 Route::get('cotacaofrete', 'App\Http\Controllers\Fretes\CalculatorController@cotacaofrete')->name('cotacaofrete');   
 
 
 Route::get('fretes', 'App\Http\Controllers\Fretes\TransportadoraController@fretes' )->name('fretes');



//rotas melhor envio
Route::group(['prefix' => 'calculator'], function() {
    Route::get('/', 'App\Http\Controllers\Fretes\CalculatorController@index')->name('calculator');
  Route::post('/result', 'App\Http\Controllers\Fretes\CalculatorController@result')->name('result');
    Route::get('/teste', 'App\Http\Controllers\Fretes\CalculatorController@teste')->name('teste');
}

);


Auth::routes();