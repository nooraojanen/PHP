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

Route::get('/', function () {
    return view('welcome');
});

Route::get('contact', function () {
    return view('contact');
});

Route::get('contact2', 'Contact2Controller@showinfo');
Route::get('contact21', 'Contact2Controller@returninfo');

Route::get('viewfromfolder', 'Contact2Controller@viewfromfolder');
Route::get('viewfromfolder2', 'Contact2Controller@viewfromfolder2');

Route::get('about', 'PagesController@about');
Route::get('about2', 'PagesController@about2');

Route::get('Boo', function () {
    return 'Bar';
});

Route::get('articles', 'ArticlesController@index');

Route::get('articles/create', 'ArticlesController@create');

Route::get('articles/{id}', 'ArticlesController@show');

Route::post('articles', 'ArticlesController@store');

Route::get('studentjson', 'StudentController@studentjson');
Route::get('coursejson', 'StudentController@coursejson');

Route::get('student', 'StudentController@studentlist');
Route::get('course', 'StudentController@courselist');

Route::get('studentincourses', 'StudentController@studentincourses');

Route::get('studentcredits', 'StudentController@studentcredits');

Route::get('studentform', 'StudentController@studentform');
Route::post('/storestudent','StudentController@store');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('users', 'UserController@list_all');

Route::get('harkat', 'HarkkaController@list_all');

//Route::get('pscores', 'KyselyController@list_personal_scores');

Route::get('/pscores', [
    'middleware' => 'auth',
    'uses' => 'KyselyController@list_personal_scores'
]);