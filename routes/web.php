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

Route::get('/', [App\Http\Controllers\IndexController::class, 'landingpage'])->name('landingpage');
Route::get('berita/detail_berita/{item}', [App\Http\Controllers\IndexController::class, 'viewDataBerita']);
Route::get('profile/visi_misi', [App\Http\Controllers\ApiController\VisimisiController::class, 'index'])->name('profile/visi_misi');
Route::get('profile/sejarah_desa', [App\Http\Controllers\SejarahController::class, 'index'])->name('profile/sejarah_desa');
Route::get('profile/potensi_desa', [App\Http\Controllers\ApiController\PotensiController::class, 'potensi'])->name('profile/potensi_desa');
Route::get('profile/detail_potensi/{item}',[App\Http\Controllers\ApiController\PotensiController::class, 'detail_potensi']);
Route::get('berita', [App\Http\Controllers\ApiController\BeritaController::class, 'berita'])->name('berita');
Route::get('berita/detail_berita/{item}',[App\Http\Controllers\ApiController\BeritaController::class, 'detail_berita']);
Route::get('berita/berita_kategori/{kategori}', [App\Http\Controllers\ApiController\BeritaController::class, 'berita_kategori']);
Route::get('berita/arsip_berita/{month}/{year}', [App\Http\Controllers\ApiController\BeritaController::class, 'arsip_berita']);
Route::get('regulasi', [App\Http\Controllers\RegulasiController::class, 'index'])->name('regulasi');
Route::get('laporan_apdes', [App\Http\Controllers\LaporanApdesController::class, 'index'])->name('laporan_apdes');
//Route::get('lapor', [App\Http\Controllers\LaporController::class, 'index'])->name('lapor');
Route::get('map', [App\Http\Controllers\MapController::class, 'index'])->name('map');
Route::get('contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contacts');
Route::get('map', [App\Http\Controllers\ContactController::class, 'map'])->name('map');
Route::get('siskeudes', [App\Http\Controllers\SiskeudesController::class, 'index'])->name('siskeudes');
Route::post('savekontak', [App\Http\Controllers\ContactController::class, 'ContactUsForm'])->name('savekontak');

Route::get('lapak_desa', [App\Http\Controllers\ApiController\LapakController::class, 'lapak_desa'])->name('lapak_desa');
Route::get('lapak_desa/detail_lapak/{item}',[App\Http\Controllers\ApiController\LapakController::class, 'detail_lapak']);

// Kampung Nila
Route::get('kampung_nila', [App\Http\Controllers\KampungNilaController::class, 'kampung_nila'])->name('kampung_nila');
Route::get('kampungnila/berita_kampungnila', [App\Http\Controllers\ApiController\KampungNilaController::class, 'berita_kampungnila'])->name('kampungnila/berita_kampungnila');
Route::get('kampungnila/detail_berita_kampungnila/{item}',[App\Http\Controllers\ApiController\KampungNilaController::class, 'detail_berita_kampungnila']);
Route::get('kampungnila/arsip_berita_kampungnila/{month}/{year}', [App\Http\Controllers\ApiController\KampungNilaController::class, 'arsip_berita_kampungnila']);

Route::get('kampungnila/testimoni', [App\Http\Controllers\KampungNilaController::class, 'testimoni'])->name('kampungnila/testimoni');
Route::post('saveTestimoni', [App\Http\Controllers\KampungNilaController::class, 'saveTestimoni'])->name('saveTestimoni');

Route::get('kampungnila/paket_mina_eduwisata', [App\Http\Controllers\ApiController\PaketMinaEduwisataController::class, 'index'])->name('kampungnila/paket_mina_eduwisata');
Route::get('kampungnila/detail_paket_mina_eduwisata/{item}',[App\Http\Controllers\ApiController\PaketMinaEduwisataController::class, 'detail_paket_mina_eduwisata']);

Route::get('kampungnila/produk_sfv_kampungnila', [App\Http\Controllers\ApiController\ProdukSPFController::class, 'index'])->name('kampungnila/produk_sfv_kampungnila');
Route::get('kampungnila/detail_produk_sfv_kampungnila/{item}',[App\Http\Controllers\ApiController\ProdukSPFController::class, 'detail_produk_sfv_kampungnila']);
//Route::get('profile/visi_misi', [App\Http\Controllers\IndexController::class, 'visi_misi'])->name('profile/visi_misi');

Route::get('kampungnila/sfv_kampungnila', [App\Http\Controllers\KampungNilaController::class,'sfv_kampungnila'])->name('kampungnila/sfv_kampungnila');
Route::get('kampungnila/pasar_kertamanggala', [App\Http\Controllers\KampungNilaController::class,'pasar_kertamanggala'])->name('kampungnila/pasar_kertamanggala');
Route::get('kampungnila/nila_mart', [App\Http\Controllers\KampungNilaController::class,'nila_mart'])->name('kampungnila/nila_mart');
Route::get('kampungnila/detail_nila_mart/{item}',[App\Http\Controllers\KampungNilaController::class, 'detail_nila_mart']);
Route::get('kampungnila/minaeduwisata', [App\Http\Controllers\KampungNilaController::class,'minaeduwisata'])->name('kampungnila/minaeduwisata');
Route::get('kampungnila/detail_minaeduwisata/{item}',[App\Http\Controllers\KampungNilaController::class, 'detail_minaeduwisata']);
Route::get('kampungnila/budidaya', [App\Http\Controllers\KampungNilaController::class,'budidaya'])->name('kampungnila/budidaya');
Route::get('kampungnila/detail_budidaya/{item}',[App\Http\Controllers\KampungNilaController::class, 'detail_budidaya']);
Route::get('kampungnila/kolam_pemancingan_lembah_ereng', [App\Http\Controllers\KampungNilaController::class,'kolam_pemancingan_lembah_ereng'])->name('kampungnila/kolam_pemancingan_lembah_ereng');
Route::get('kampungnila/pengolahan_ikan', [App\Http\Controllers\KampungNilaController::class,'pengolahan_ikan'])->name('kampungnila/pengolahan_ikan');
Route::get('kampungnila/detail_pengolahan_ikan/{item}',[App\Http\Controllers\KampungNilaController::class, 'detail_pengolahan_ikan']);
Route::get('kampungnila/resto', [App\Http\Controllers\KampungNilaController::class,'resto'])->name('kampungnila/resto');
Route::get('kampungnila/detail_resto/{item}',[App\Http\Controllers\KampungNilaController::class, 'detail_resto']);

Route::get('kampungnila/gapokkan_sfv', [App\Http\Controllers\GapokkanController::class, 'index'])->name('kampungnila/gapokkan_sfv');
Route::get('kampungnila/detail_gapokkan/{item}',[App\Http\Controllers\GapokkanController::class, 'detail_gapokkan']);


Route::get('data_desa/data_wilayah_administratif', [App\Http\Controllers\WilayahAdministratifController::class, 'index'])->name('data_desa/data_wilayah_administratif');
Route::get('data_desa/data_pendidikan', [App\Http\Controllers\DataPendidikanController::class, 'index'])->name('data_desa/data_pendidikan');
Route::get('data_desa/data_pekerjaan', [App\Http\Controllers\DataPekerjaanController::class, 'index'])->name('data_desa/data_pekerjaan');
Route::get('data_desa/data_agama', [App\Http\Controllers\DataAgamaController::class, 'index'])->name('data_desa/data_agama');
Route::get('data_desa/data_jenis_kelamin', [App\Http\Controllers\DataJenkelController::class, 'index'])->name('data_desa/data_jenis_kelamin');
Route::get('data_desa/data_umur', [App\Http\Controllers\DataUmurController::class, 'index'])->name('data_desa/data_umur');
Route::get('data_desa/aparatur_desa', [App\Http\Controllers\AparaturDesaController::class, 'index'])->name('data_desa/aparatur_desa');
//Route::get('idm', [App\Http\Controllers\IdmController::class, 'index'])->name('idm');
Route::get('idm/{item}',[App\Http\Controllers\IdmController::class, 'index'])->name('idm');;






