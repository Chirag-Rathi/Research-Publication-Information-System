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
    return view('register');
});

Route::get('/workshopAttended', function () {
    return view('workshopAttended');
});

Route::get('/workshopReport', function () {
    return view('workshopReport');
});


//Login Routes
Route::get('/login','SigninController@index');
Route::post('/checklogin','SigninController@checklogin');
Route::get('/success','SigninController@successlogin');
Route::get('/logout','SigninController@logout');


Route::get('/workshopReportAjax','workshopReportController@submit');

Route::post('/workshopAttended/submit','workshopController@submit');

Route::post('/register/submit','SignupController@register');

Route::get('/register',function(){
	return view('register');
});

Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::post('/password/reset','Auth\ResetPasswordController@reset');


//Email Verification
Route::get('verifyEmailFirst','SignupController@verifyEmailFirst')->name('verifyEmailFirst');
Route::get('verify/{email}/{verifyToken}','SignupController@sendEmailDone')->name('sendEmailDone');
Route::post('/resend','SignupController@resend');

Route::get('/journal',function(){
	return view('journal_beta');
});

Route::get('/user/verify/{token}', 'signup@verifyUser');

Route::get('/researchprojects',function(){
	return view('researchProject');
});

Route::get('/conference',function(){
	return view('conference_beta');
});

Route::get('/book',function(){
	return view('publication_book');
});

Route::get('/consultancy',function(){
	return view('consultancy_beta');
});

Route::get('/mou',function(){
	return view('mou_beta');
});


Route::post('/oldResearch','researchProjectController@insertResearchDetails');
Route::post('/checkProject','researchProjectController@checkProject');

Route::post('/consultancy_beta/submit','consultancyController@submit');

Route::post('mou/submit','mouController@submit');

Route::get('/ipr',function(){
	return view('ipr');
});

Route::get('/patents',function(){
	return view('patents');
});

Route::post('/checkPaper','publicationJournalController@checkPaper');
Route::post('publicationJournal/submit','publicationJournalController@insertJournalInfo');
Route::post('/fnsPaperAddAuth','publicationJournalController@addAuthorToExisting');
Route::post('/fnsPaperUpdateCitations','publicationJournalController@updateExistingCitations');
Route::post('/firstAuthorAjax','publicationJournalController@ajaxReqForFirstAuthor');
Route::post('/fnsPaperFirstAuthor','publicationJournalController@updationOfFirstAuthor');
Route::post('/citationAjax','publicationJournalController@dynamicUpdationOfCitations');

Route::post('/checkBook','publicationBookController@checkBook');
Route::post('/fnsBookAddAuth','publicationBookController@addAuth');
Route::post('/fnsBookFirstAuthor','publicationBookController@bookFirstAuth');
Route::post('publicationBook/submit','publicationBookController@bookData');
Route::post('/firstAuthorAjaxBook','publicationBookController@bookAjax');
Route::post('/bookReport','bookReportsController@genReport');

Route::get('/bookReports',function(){
	return view('bookReports');
});
