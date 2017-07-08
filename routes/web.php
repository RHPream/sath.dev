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

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function() {
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

  // Password reset routes
  Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
  Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

  Route::resource('exams','Admins\ExamController');
  Route::get('set-question/{id}','Admins\ExamController@setQuestion');
  Route::PATCH('add-question/{id}','Admins\ExamController@addQuestion');

  Route::resource('subject','Admins\SubjectController');
  Route::resource('lecture','Admins\LactureController');
  Route::resource('chapter','Admins\ChapterController');
  Route::POST('get-chapter/{id}','Admins\LactureController@getChapter');
  Route::resource('university','Admins\UniversityController');
  Route::resource('circular','Admins\CircularController');
  Route::resource('message','Admins\MessageController');
  Route::get('home-page','Admins\PageController@homePageEdit');
  Route::post('home-page','Admins\PageController@homePageUpdate')->name('home-page.store');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Exam Route
Route::get('/exam','Users\ExamController@index');
Route::get('/rank','Users\ExamController@rank');
Route::post('/exam-submit','Users\ExamController@judge')->name('submit-ans');

Route::get('/final-exam','Users\ExamController@finalModelTest');


Route::get('/subject','Users\SubjectController@index');
Route::get('/routine','Users\SubjectController@routine');
Route::get('/question','Users\SubjectController@question');