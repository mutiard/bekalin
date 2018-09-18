<?php

use App\Http\Middleware\CheckStatus;

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

// Route::get('/', function(){
// 	return view ('welcome');
// });



// pemesanan
Route::get('/menu', 'PemesananController@showMenuPaketMakanan');
Route::get('/detail/{id}', 'PemesananController@showDetailPaketMakanan');

Route::get('/gizi', 'AsistenGiziController@showFormGizi');
Route::get('/giziTimeline', 'AsistenGiziController@showTimeline');
Auth::routes();
Route::get('/adminGizi', 'AsistenGiziController@showAdminGizi');
Route::post('/adminGizi', 'AsistenGiziController@setAdminGizi');
Route::post('/jawabAdminGizi/{id}', 'AsistenGiziController@setJawabAdminGizi');
Route::get('/', 'AsistenGiziController@showHalamanUtama');

Route::get('/home', 'HomeController@index')->name('welcome');

Route::get('/settingProfil', 'ProfilController@getProfil');
Route::get('/showProfilAnak', 'ProfilController@showProfilAnak');
Route::post('/settingProfilku', 'ProfilController@setProfil');
Route::get('/settingProfilAnak', 'ProfilController@getProfilAnak');
Route::post('/settingProfilAnak', 'ProfilController@setProfilAnak');
Route::get('/showProfil','ProfilController@showProfil');

Route::get('admin/routes', 'HomeController@showAdmin')->middleware('admin');

Route::get('/admin', 'PaketController@index')->name('index');
// Route::get('/posts/details/{id}', 'PaketController@details')->name('posts.details');
Route::get('/add', 'PaketController@add')->name('add');
Route::get('/getPaket/{id}', 'PaketController@getPaket');
Route::post('/setPaket', 'PaketController@setPaket');
Route::get('/edit', 'PaketController@edit')->name('edit');
Route::post('/update/{id}', 'PaketController@update')->name('update');
Route::post('/setEditPaket/{id}', 'PaketController@setEditPaket')->name('ubah');
Route::get('/delete/{id}', 'PaketController@delete')->name('delete');


