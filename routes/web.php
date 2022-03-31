

   
   
   
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

// Route::get('/', function () {	
//     return view('welcome');
// });


Route::get('/login', function () {
    return view('auth.login'); })->name('login');

Route::post('/postlogin', 'LoginController@postlogin')-> name('postlogin');
Route::get('/logout', 'LoginController@logout')-> name('logout');

Route::get('/', 'MasyarakatController@index');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ujikriteria', 'MasyarakatController@uji' );
    
Route::group(['middleware'=>['auth','CekAkses:Admin']], function() {

    Route::get('petugas','PetugasController@index');
    Route::get('petugas/tambah', 'PetugasController@tambah');
    Route::post('petugas/simpan', 'PetugasController@simpan');
    Route::get('petugas/{id}/ubah', 'PetugasController@ubah');
    Route::put('petugas/{id}/update', 'PetugasController@update');
    Route::get('petugas/{id}/hapus', 'PetugasController@hapus');
    
    Route::get('/kriteria', 'KriteriaController@index');
    Route::get('kriteria/tambah', 'KriteriaController@tambah');
    Route::post('kriteria/simpan', 'KriteriaController@simpan');
    Route::get('kriteria/{id}/ubah', 'KriteriaController@ubah');
    Route::put('kriteria/{id}/update', 'KriteriaController@update');
    Route::get('kriteria/{id}/hapus', 'KriteriaController@hapus');
    
    Route::get('/keputusan', 'KeputusanController@index');
    Route::get('keputusan/tambah','KeputusanController@tambah');
    Route::post('keputusan/simpan', 'KeputusanController@simpan');
    Route::get('keputusan/{id}/ubah', 'KeputusanController@ubah');
    Route::put('keputusan/{id}/update', 'KeputusanController@update');
    Route::get('keputusan/{id}/hapus', 'KeputusanController@hapus');    
});
Route::get('/home', 'DataController@index');

Route::group(['middleware'=>['auth','CekAkses:Petugas']], function() {
Route::get('data/tambah','DataController@tambah');    
Route::post('data/simpan', 'DataController@simpan');
Route::get('data/{id}/ubah', 'DataController@ubah');
Route::put('data/{id}/update', 'DataController@update');
Route::get('data/{id}/hapus', 'DataController@hapus');
});
