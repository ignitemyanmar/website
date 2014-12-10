<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('language',		function(){
	$oldlanguage=Session::get('language') ? Session::get('language') : "";
	Session::put('oldlanguage',$oldlanguage);
	$language=Input::get('language');
	Session::put('language',$language);
});

Route::get('/', 								'HomeController@getIndex');
Route::get('/search', 							'HomeController@getSearch');
Route::get('schedule1', 						'HomeController@getSchedule');
Route::get('schedule', 							'HomeController@getSchedulenew');
Route::get('type/{lan}/{type}', 				'HomeController@getMenuCategory');
Route::get('news&events', 						'HomeController@getNewsEvents');
Route::get('news&events/{id}/{title}', 			'HomeController@getNewsEventsDetail');

Route::get('type/{lan}/{type}/{id}/{title}', 	'HomeController@getDetail');
Route::get('{lan}/faq', 						'FAQController@getFaq');
Route::get('{lan}/contact-us', 					'HomeController@getContactUs');
Route::get('{lan}/about-us', 					'AboutUsController@getAboutUs');
Route::get('{lan}/contact-us', 					'ContactUsController@getContactUs');

Route::get('user/register/{id}/{name}',			'RegisterController@getIndex');
Route::post('user/login', 						'RegisterController@login');
Route::get('registration', 						'RegisterController@store');
Route::get('enroll', 							'RegisterController@enrolllist');



/*Route::get('/admin', function()
{
        return View::make('admin.login');
});*/

Route::group(array('before' => 'auth'), function()
{
   /* Route::get('admin',array('as' => 'admin', function () 
    {
        return View::make('admin.login');
    }));
	*/
	Route::get('banner',						'BannerController@index');
	Route::get('banner-create',					'BannerController@create');
	Route::post('banner',						'BannerController@store');
	Route::get('banner/{id}',  					'BannerController@edit');
	Route::post('banner/{id}',  				'BannerController@update');
	Route::get('banner-delete/{id}',   			'BannerController@destroy');

	Route::get('seminartypecreate',				'SeminarTypeController@getAddSeminarType');
	Route::post('/addseminartype',				'SeminarTypeController@postAddSeminarType');
	Route::get('/seminartypelist',				'SeminarTypeController@showSeminarTypeList');
	Route::get('seminartype-update/{id}',  		'SeminarTypeController@getEditSeminarType');
	Route::post('updateseminartype/{id}',  		'SeminarTypeController@postEditSeminarType');
	Route::get('deleteseminartype/{id}',   		'SeminarTypeController@getDeleteSeminarType');

	Route::get('consultancycreate',				'ConsultancyController@getAddConsultancy');
	Route::post('/addconsultancy',				'ConsultancyController@postAddConsultancy');
	Route::get('/consultancylist',				'ConsultancyController@showConsultancyList');
	Route::get('consultancy-update/{id}',  		'ConsultancyController@getEditConsultancy');
	Route::post('updateconsultancy/{id}',  		'ConsultancyController@postEditConsultancy');
	Route::get('deleteconsultancy/{id}',   		'ConsultancyController@getDeleteConsultancy');

	Route::get('downloadtimetablecreate',		 'DownloadTimetableController@getAddDownloadTimetable');
	Route::post('/adddownloadtimetable',		 'DownloadTimetableController@postAddDownloadTimetable');
	Route::get('/downloadtimetablelist',		 'DownloadTimetableController@showDownloadTimetableList');
	Route::get('downloadtimetable-update/{id}',  'DownloadTimetableController@getEditDownloadTimetable');
	Route::post('updatedownloadtimetable/{id}',  'DownloadTimetableController@postEditDownloadTimetable');
	Route::get('deletedownloadtimetable/{id}',   'DownloadTimetableController@getDeleteDownloadTimetable');

	Route::get('faqcreate',		 				 'FAQController@getAddFAQ');
	Route::post('/addfaq',		 				 'FAQController@postAddFAQ');
	Route::get('/faqlist',		 				 'FAQController@showFAQList');
	Route::get('faq-update/{id}',  				 'FAQController@getEditFAQ');
	Route::post('updatefaq/{id}',  				 'FAQController@postEditFAQ');
	Route::get('deletefaq/{id}',   				 'FAQController@getDeleteFAQ');

	Route::get('contactuscreate',		 		 'ContactUsController@getAddContactUs');
	Route::post('/addcontactus',		 		 'ContactUsController@postAddContactUs');
	Route::get('/contactuslist',		 		 'ContactUsController@showContactUsList');
	Route::get('contactus-update/{id}',  		 'ContactUsController@getEditContactUs');
	Route::post('updatecontactus/{id}',  		 'ContactUsController@postEditContactUs');
	Route::get('deletecontactus/{id}',   		 'ContactUsController@getDeleteContactUs');

	Route::get('aboutuscreate',		 		     'AboutUsController@getAddAboutUs');
	Route::post('/addaboutus',		 		     'AboutUsController@postAddAboutUs');
	Route::get('/aboutuslist',		 		     'AboutUsController@showAboutUsList');
	Route::get('aboutus-update/{id}',  		     'AboutUsController@getEditAboutUs');
	Route::post('updateaboutus/{id}',  		     'AboutUsController@postEditAboutUs');
	Route::get('deleteaboutus/{id}',   		     'AboutUsController@getDeleteAboutUs');

	Route::get('aboutusimgcreate',		 		 'AboutUsImageController@getAddAboutUsImage');
	Route::post('/addaboutusimg',		 		 'AboutUsImageController@postAddAboutUsImage');
	Route::get('/aboutusimglist',		 		 'AboutUsImageController@showAboutUsImageList');
	Route::get('aboutusimg-update/{id}',  		 'AboutUsImageController@getEditAboutUsImage');
	Route::post('updateaboutusimg/{id}',  		 'AboutUsImageController@postEditAboutUsImage');
	Route::post('delaboutusimg',          		 'AboutUsImageController@postDeleteAboutUsImage');
	Route::get('deleteaboutusimg/{id}',   		 'AboutUsImageController@getDeleteAboutUsImage');
	Route::post('searchaboutusimg',       		 'AboutUsImageController@postSearchAboutUsImage');

	Route::get('e_searchcreate',		 		 'ExecutiveSearchController@getAddExecutiveSearch');
	Route::post('/adde_search',		 		 	 'ExecutiveSearchController@postAddExecutiveSearch');
	Route::get('/e_searchlist',		 		 	 'ExecutiveSearchController@showExecutiveSearchList');
	Route::get('e_search-update/{id}',  		 'ExecutiveSearchController@getEditExecutiveSearch');
	Route::post('updatee_search/{id}',  		 'ExecutiveSearchController@postEditExecutiveSearch');
	Route::get('deletee_search/{id}',   		 'ExecutiveSearchController@getDeleteExecutiveSearch');

	Route::get('news_events',					  	'NewsEventsController@index');
	Route::get('news_events-create',			  	'NewsEventsController@create');
	Route::post('news_events',						'NewsEventsController@store');
	Route::get('news_events/{id}',  				'NewsEventsController@edit');
	Route::post('news_events/{id}',  				'NewsEventsController@update');
	Route::get('news_events-delete/{id}',   		'NewsEventsController@destroy');

	Route::get('usercreate',		 		 	 'UserController@getAddUser');
	Route::post('/adduser',		 		 		 'UserController@postAddUser');
	Route::get('/userlist',		 		 		 'UserController@showUserList');
	Route::get('user-update/{id}',  		 	 'UserController@getEditUser');
	Route::post('updateuser/{id}',  		 	 'UserController@postEditUser');
	Route::get('deleteuser/{id}',   		 	 'UserController@getDeleteUser');

	Route::get('languagecreate',		 		 'LanguageController@getAddLanguage');
	Route::post('/addlanguage',		 		 	 'LanguageController@postAddLanguage');
	Route::get('/languagelist',		 		 	 'LanguageController@showLanguageList');
	Route::get('language-update/{id}',  		 'LanguageController@getEditLanguage');
	Route::post('updatelanguage/{id}',  		 'LanguageController@postEditLanguage');
	Route::get('deletelanguage/{id}',   		 'LanguageController@getDeleteLanguage');

	Route::get('seminarcreate',		 		     'SeminarController@getAddSeminar');
	Route::post('/addseminar',		 		 	 'SeminarController@postAddSeminar');
	Route::get('/seminarlist',		 		 	 'SeminarController@showSeminarList');
	Route::get('seminar-update/{id}',  		     'SeminarController@getEditSeminar');
	Route::post('updateseminar/{id}',  		     'SeminarController@postEditSeminar');
	Route::get('deleteseminar/{id}',   		     'SeminarController@getDeleteSeminar');

	Route::get('languageseminarcreate',		     'SeminarLanguageController@getAddSeminarLanguage');
	Route::post('/addseminarlanguage',		 	 'SeminarLanguageController@postAddSeminarLanguage');
	Route::get('/languageseminarlist',		 	 'SeminarLanguageController@showSeminarLanguageList');
	Route::get('seminarlanguage-update/{id}',    'SeminarLanguageController@getEditSeminarLanguage');
	Route::post('updateseminarlanguage/{id}',  	 'SeminarLanguageController@postEditSeminarLanguage');
	Route::get('deleteseminarlanguage/{id}',   	 'SeminarLanguageController@getDeleteSeminarLanguage');

	Route::get('timetablecreate',		         'TimeTableController@getAddTimeTable');
	Route::post('/addtimetable',		 	 	 'TimeTableController@postAddTimeTable');
	Route::get('/timetablelist',		 	 	 'TimeTableController@showTimeTableList');
	Route::get('timetable-update/{id}',    		 'TimeTableController@getEditTimeTable');
	Route::post('updatetimetable/{id}',  	 	 'TimeTableController@postEditTimeTable');
	Route::get('deletetimetable/{id}',   	 	 'TimeTableController@getDeleteTimeTable');

	Route::get('seminarimagecreate',		     'SeminarImagesController@getAddSeminarImages');
	Route::post('/addseminarimage',		 	 	 'SeminarImagesController@postAddSeminarImages');
	Route::get('/seminarimagelist',		 	 	 'SeminarImagesController@showSeminarImagesList');
	Route::get('seminarimage-update/{id}',       'SeminarImagesController@getEditSeminarImages');
	Route::post('updateseminarimage/{id}',  	 'SeminarImagesController@postEditSeminarImages');
	Route::get('deleteseminarimage/{id}',   	 'SeminarImagesController@getDeleteSeminarImages');

	Route::get('studentregister',		     	 'StudentController@getRegisterStudent');
	Route::post('/addregisterstudent',		 	 'StudentController@postRegisterStudent');
	Route::get('/studentlist',		 	 	 	 'StudentController@showStudentList');
	Route::get('register-update/{id}',       	 'StudentController@getEditProfile');
	Route::post('updateregister/{id}',  	 	 'StudentController@postUpdateProfile');
	Route::get('deleteregister/{id}',   	 	 'StudentController@getDeleteStudent');
	
});
Route::get('admin',array('as'=>'admin','uses'=>'UserController@getLogin'))->before('guest');
Route::post('administration','UserController@postLogin');
Route::get('users-logout',array('as'=>'logout','uses'=>'UserController@getLogout'))->before('auth');

Route::get('/404', function()
{
    return View::make('error.404');
});
Route::get('/500', function()
{
    return View::make('error.500');
});



