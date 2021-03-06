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

Route::get('/', 'Users\PageController@welcome');

Auth::routes();
Route::get('register/confirm/{token}', 'Auth\RegisterController@confirmUser');
Route::get('/home', 'HomeController@index');
Route::get('/preparation', 'Users\PageController@preparation');
Route::get('/preparation/{id}', 'Users\PageController@preparationClass');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::post('contact-us', 'Users\PageController@contactUs');

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
  Route::resource('routine','Admins\RoutineController');
  Route::get('class-routine/{id}','Admins\RoutineController@classWise');
  Route::get('/routine/create/{id}','Admins\RoutineController@create');
  Route::POST('get-chapter/{id}','Admins\LactureController@getChapter');
  Route::resource('university','Admins\UniversityController');
  Route::resource('circular','Admins\CircularController');
  Route::resource('message','Admins\MessageController');
  Route::get('home-page','Admins\PageController@homePageEdit');
  Route::post('home-page','Admins\PageController@homePageUpdate')->name('home-page.store');
  Route::get('payment','Admins\PaymentController@index');
  Route::post('approve-payment/{id}','Admins\PaymentController@approve');
  Route::post('live-pay','Admins\PaymentController@livePay')->name('live-pay');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/user-update', 'HomeController@userUpdate')->name('user-update');

//Exam Route
Route::get('/lecture-wise-exams','Users\ExamController@lectureWiseExams');
Route::get('/subject-wise-exams','Users\ExamController@subjectWiseExams');
Route::get('/year-wise-exams','Users\ExamController@yearWiseExams');
Route::get('/exam-question/{slug}/{own}','Users\ExamController@examPaper');
Route::get('/final-exams','Users\ExamController@finalModelTest');
//Exam Judging route
Route::post('/judge-exam','Users\ExamController@judge')->name('judge-exam');
//routine route
Route::get('/routine','Users\SubjectController@routine');

Route::get('/subject/{id}','Users\SubjectController@index');

Route::get('/question','Users\SubjectController@question');

//payment route
Route::post('/pay-user', 'Users\PaymentController@pay')->name('pay-user');