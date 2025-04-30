<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});

//Route::get('/get_api_berita', 'App\Http\Controllers\ApiController\BeritaController@post_berita');
Route::post('/post_berita', 'App\Http\Controllers\ApiController\BeritaController@post_berita')->name('post.berita');
Route::post('/update_berita', 'App\Http\Controllers\ApiController\BeritaController@update_berita');
Route::post('/delete_berita', 'App\Http\Controllers\ApiController\BeritaController@delete_berita');

//Potensi
Route::post('/post_potensi', 'App\Http\Controllers\ApiController\PotensiController@post_potensi')->name('post.potensi');
Route::post('/update_potensi', 'App\Http\Controllers\ApiController\PotensiController@update_potensi');
Route::post('/delete_potensi', 'App\Http\Controllers\ApiController\PotensiController@delete_potensi');
//regulasi
Route::post('/post_regulasi', 'App\Http\Controllers\ApiController\RegulasiController@post_regulasi');
Route::post('/delete_regulasi', 'App\Http\Controllers\ApiController\RegulasiController@delete_regulasi');

Route::post('/update_sejarah', 'App\Http\Controllers\ApiController\SejarahController@update_sejarah');
//Route::post('/delete_sejarah', 'App\Http\Controllers\ApiController\sejarahController@delete_sejarah');

//regulasi
Route::post('/post_header', 'App\Http\Controllers\ApiController\HeaderController@post_header');
Route::post('/delete_header', 'App\Http\Controllers\ApiController\HeaderController@delete_header');
Route::post('/update_header', 'App\Http\Controllers\ApiController\HeaderController@update_header');

//Lapak
Route::post('/post_lapak', 'App\Http\Controllers\ApiController\LapakController@post_lapak');
Route::post('/delete_lapak', 'App\Http\Controllers\ApiController\LapakController@delete_lapak');
Route::post('/update_lapak', 'App\Http\Controllers\ApiController\LapakController@update_lapak');

// Kampung Nila
Route::post('/post_kampung_nila', 'App\Http\Controllers\ApiController\KampungNilaController@post_kampung_nila')->name('post.post_kampung_nila');
Route::post('/update_berita_kampungnila', 'App\Http\Controllers\ApiController\KampungNilaController@update_berita_kampungnila');
Route::post('/delete_berita_kampung_nila', 'App\Http\Controllers\ApiController\KampungNilaController@delete_berita_kampung_nila');

Route::post('/update_tentang_kampungnila', 'App\Http\Controllers\ApiController\TentangKampungNilaController@update_tentang_kampungnila');
Route::post('/update_pasar', 'App\Http\Controllers\ApiController\TentangKampungNilaController@update_pasar');

Route::post('/kampungnila_pengelola', 'App\Http\Controllers\ApiController\PengelolaKampungNilaController@kampungnila_pengelola');
Route::post('/update_kampungnila_pengelola', 'App\Http\Controllers\ApiController\PengelolaKampungNilaController@update_kampungnila_pengelola');
Route::post('/delete_kampungnila_pengelola', 'App\Http\Controllers\ApiController\PengelolaKampungNilaController@delete_kampungnila_pengelola');

Route::post('/post_kampung_nila_paketmina', 'App\Http\Controllers\ApiController\PaketMinaEduwisataController@post_kampung_nila_paketmina')->name('post.post_kampung_nila_paketmina');
Route::post('/update_paketmina_kampungnila', 'App\Http\Controllers\ApiController\PaketMinaEduwisataController@update_paketmina_kampungnila');
Route::post('/delete_paketmina_kampungnila', 'App\Http\Controllers\ApiController\PaketMinaEduwisataController@delete_paketmina_kampungnila');


Route::post('/post_kampung_nila_produksfv', 'App\Http\Controllers\ApiController\ProdukSPFController@post_kampung_nila_produksfv')->name('post.post_kampung_nila_produksfv');
Route::post('/update_produksfv_kampungnila', 'App\Http\Controllers\ApiController\ProdukSPFController@update_produksfv_kampungnila');
Route::post('/delete_produksfv_kampungnila', 'App\Http\Controllers\ApiController\ProdukSPFController@delete_produksfv_kampungnila');

Route::post('/post_kampung_nila_mart', 'App\Http\Controllers\ApiController\NilaMartController@post_kampung_nila_mart')->name('post_kampung_nila_mart');
Route::post('/update_nilamart_kampungnila', 'App\Http\Controllers\ApiController\NilaMartController@update_nilamart_kampungnila');
Route::post('/delete_mart_kampung_nila', 'App\Http\Controllers\ApiController\NilaMartController@delete_mart_kampung_nila');

Route::post('/post_eduwisata', 'App\Http\Controllers\ApiController\MinaEduwisataController@post_eduwisata')->name('post_eduwisata');
Route::post('/update_eduwisata', 'App\Http\Controllers\ApiController\MinaEduwisataController@update_eduwisata');
Route::post('/delete_eduwisata', 'App\Http\Controllers\ApiController\MinaEduwisataController@delete_eduwisata');

Route::post('/post_kampung_nila_budidaya', 'App\Http\Controllers\ApiController\BudidayaController@post_kampung_nila_budidaya')->name('post_kampung_nila_budidaya');
Route::post('/update_budidaya_kampungnila', 'App\Http\Controllers\ApiController\BudidayaController@update_budidaya_kampungnila')->name('update_budidaya_kampungnila');
Route::post('/delete_budidaya_kampungnila', 'App\Http\Controllers\ApiController\BudidayaController@delete_budidaya_kampungnila')->name('delete_budidaya_kampungnila');

Route::post('/update_kolamikan_kampungnila', 'App\Http\Controllers\ApiController\KolamPemancinganController@update_kolamikan_kampungnila');

Route::post('/post_kampung_nila_pokdakan', 'App\Http\Controllers\ApiController\PokdakanController@post_kampung_nila_pokdakan')->name('post_kampung_nila_pokdakan');
Route::post('/update_kampung_nila_pokdakan', 'App\Http\Controllers\ApiController\PokdakanController@update_kampung_nila_pokdakan')->name('update_kampung_nila_pokdakan');
Route::post('/delete_kampung_nila_pokdakan', 'App\Http\Controllers\ApiController\PokdakanController@delete_kampung_nila_pokdakan')->name('delete_kampung_nila_pokdakan');

Route::post('/post_kampung_nila_pengolahan', 'App\Http\Controllers\ApiController\PengolahanIkanController@post_kampung_nila_pengolahan')->name('post_kampung_nila_pengolahan');
Route::post('/update_pengolahan_kampungnila', 'App\Http\Controllers\ApiController\PengolahanIkanController@update_pengolahan_kampungnila');
Route::post('/delete_pengolahan_kampung_nila', 'App\Http\Controllers\ApiController\PengolahanIkanController@delete_pengolahan_kampung_nila');

Route::post('/post_kampung_nila_resto', 'App\Http\Controllers\ApiController\RestoController@post_kampung_nila_resto')->name('post_kampung_nila_resto');
Route::post('/update_resto_kampungnila', 'App\Http\Controllers\ApiController\RestoController@update_resto_kampungnila')->name('update_resto_kampungnila');
Route::post('/delete_resto_kampungnila', 'App\Http\Controllers\ApiController\RestoController@delete_resto_kampungnila')->name('delete_resto_kampungnila');

Route::post('/delete_testimoni_kampungnila', 'App\Http\Controllers\ApiController\KampungNilaController@delete_testimoni_kampungnila');
Route::post('/update_testimoni_kampungnila', 'App\Http\Controllers\ApiController\KampungNilaController@update_testimoni_kampungnila');
