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


Route::get('/a', 							'TestpostFacebookController@getIndex');
Route::post('/contact-to-dealer',  			'MailController@index');


Route::get('/', 							'HomeController@getIndex');
Route::get('/sell-car', 					'CarController@getCarUserUpload');
Route::get('/sell-car/my-vehicles',			'CarController@getMyCarlists');
Route::get('/sell-car/add-new-vehicle',		'CarController@getCarUserUpload');
Route::get('/sell-car/update-vehicle/{id}', 'CarController@getVehicleUpdate');
Route::get('/sell-car/my-profile',			'CarController@getDealerinfo');
Route::get('sell-car/delete/{id}', 			'CarController@getDeleteMyCar');

Route::get('/imgdetail',							'CarController@imgdetail');

Route::get('buy-car', 								'CarController@getbuycar');
Route::get('buy-car/{type}', 						'CarController@getbuycarbytype');
Route::get('buy-car/{type}/{id}/{make}/{model}',	'CarController@getCarDetailinfo');

Route::get('buy-car/brands/{brand}', 				'CarController@getbuycarbybrand');
Route::get('buy-cars/search-cars', 					'SearchController@getsearchcars');
Route::get('savevehicle', 							'CarController@getSaveVehicle');
Route::get('removevehicle', 						'CarController@getRemoveVehicle');
Route::get('compare-vehicles', 						'CarController@getCompareVehicle');


Route::get('brandlistbycategory/{category}', 		'SearchController@getbrandlistbycategory');
Route::get('modellistbybrand/{brandid}', 			'SearchController@getmodellistbybrand');

Route::get('news', 							'NewsController@getIndex');
Route::get('news/{type}', 					'NewsController@getnewsbytype');
Route::get('news/{type}/{title}', 			'NewsController@getnewsdetail');

Route::get('articles', 						'ArticleController@getallarticle');
Route::get('articles/{type}', 				'ArticleController@getarticlebytype');
Route::get('articles/{type}/{title}', 		'ArticleController@getarticledetail');

Route::get('business-guide', 				'BusinessGuideController@getallbusiness');
Route::get('business-guide/search', 		'BusinessGuideController@getbusinesssearch');
Route::get('business-guide/{type}', 		'BusinessGuideController@getbusinessbytype');
Route::get('business-guide/{type}/{title}', 'BusinessGuideController@getbusinessdetail');
Route::resource('businessguide-search',    'BusinessGuideController@postSearchBusinessGuide');

Route::get('contact-us', 					'ContactController@getcontact');



Route::get('forgotpassword', 			'UserController@getforgotpassword');
Route::post('forgotpassword', 			'UserController@postforgotpassword');
Route::get('resetpassword/{email}/{randno}', 	'UserController@getresetpassword');
Route::post('resetpassword', 			'UserController@postresetpassword');
Route::get('modellist/{make}',      'ModelsController@getModelsByMake');

Route::post('login-register/user-login', 		'UserController@postfrontLogin');
Route::get('login-register/user-logout', 		'UserController@getfrontLogout');
Route::get('users/register', 					'UserController@getRegister');
Route::post('users/register', 					'UserController@postRegister');
Route::post('users/profile-update/{id}', 		'UserController@postProfileupdate');

Route::group(array('before' => 'auth'), function()
		{

			Route::get('imeauto', 				array('as' => 'imeauto', function () {
		        return View::make('admin.login');
		    }));

		Route::post('image-upload/{folder}',           'UploadController@postFileUpload');
		Route::post('removefile', 						'UploadController@postremovefile');

		/***
		*---------- User route--------------------
		*/
		Route::get('user-create',           'UserController@adduser');
		Route::post('addnewuser',       	'UserController@addnewuser');
		Route::get('userlist',				array('as'=>'listuser','uses'=>'UserController@listuser'));
		Route::get('edituser/{id}',     	'UserController@toedituser')->before('auth');
		Route::post('updateuser/{id}',  	'UserController@edituser');
		Route::get('deleteuser/{id}',   	'UserController@deluser')->before('auth');

		Route::get('car-create',            			'CarController@getAddCar');
		Route::post('addnewcar',       					'CarController@postAddCar');
		Route::post('vehicle-update/{id}',       		'CarController@postVehicleUpdate');
		Route::get('carlist',							'CarController@getCarlist');
		Route::get('car-update/{id}',     				'CarController@getEditCar');
		Route::post('updatecar/{id}',  					'CarController@postUpdateCar');
		Route::get('deletecar/{id}',   					'CarController@getDeleteCar');
		Route::post('deleteusers',   					'CarController@postDeleteCars');
		Route::get('car-status-change/{status}/{id}',	'CarController@getStatusChange');

		Route::get('car-status-change/{id}',			'CarController@getSoldStatusChange');


		Route::get('car-make-create',        'MakeController@getAddMake');
		Route::post('addcarmake',            'MakeController@postAddMake');
		Route::resource('car-makelist',           'MakeController@getAllCarmake');
		Route::get('car-make-update/{id}',   'MakeController@getEditcarmake');
		Route::get('make-status-change/show/{id}','MakeController@getShow');
		Route::get('make-status-change/hide/{id}','MakeController@getHide');
		Route::post('updatecarmake/{id}',    'MakeController@postEditcarmake');
		Route::post('delcarmakes',           'MakeController@postdelcarmake');
		Route::get('deletecarmake/{id}',     'MakeController@getDeletecarmake');
		Route::resource('searchcarmake',         'MakeController@postSearchCarmake');

		Route::get('car-condition-create',     'ConditionController@getAddCondition');
		Route::post('addcondition',            'ConditionController@postAddCondition');
		Route::get('car-conditionlist',        'ConditionController@getAllCondition');
		Route::get('car-condition-update/{id}',       'ConditionController@getEditCondition');
		Route::post('updatecondition/{id}',    'ConditionController@postEditCondition');
		Route::post('delconditions',           'ConditionController@postdelcondition');
		Route::get('deletecondition/{id}',     'ConditionController@getDeleteCondition');
		Route::resource('car-condition-search','ConditionController@postSearchCondition');

		Route::get('car-body-create',           'BodyController@getAddBody');
		Route::post('addbody',            		'BodyController@postAddBody');
		Route::get('car-bodylist',            	'BodyController@getAllBody');
		Route::get('car-body-update/{id}',      'BodyController@getEditBody');
		Route::post('updatebody/{id}',    		'BodyController@postEditBody');
		Route::post('delbodys',           		'BodyController@postdelBody');
		Route::get('deletebodytype/{id}',     	'BodyController@getDeleteBody');
		Route::resource('car-body-search',         	'BodyController@postSearchBody');

		Route::get('car-engine-create',           	'EngineController@getAddengine');
		Route::post('addengine',            		'EngineController@postAddengine');
		Route::get('car-enginelist',            	'EngineController@getAllengine');
		Route::get('car-engine-update/{id}',      	'EngineController@getEditengine');
		Route::post('updateengine/{id}',    		'EngineController@postEditengine');
		Route::post('delengines',           		'EngineController@postdelengine');
		Route::get('deleteengine/{id}',     		'EngineController@getDeleteengine');
		Route::resource('car-engine-search',        'EngineController@postSearchEngine');

		Route::get('car-color-create',          'ColorController@getAddColor');
		Route::post('addcolor',            		'ColorController@postAddColor');
		Route::get('car-colorlist',             'ColorController@getAllColor');
		Route::get('car-color-update/{id}',     'ColorController@getEditColor');
		Route::post('updatecolor/{id}',    		'ColorController@postEditColor');
		Route::post('delcolors',           		'ColorController@postdelColor');
		Route::get('deletecolor/{id}',     		'ColorController@getDeleteColor');
		Route::resource('searchcolor',         		'ColorController@postSearchColor');

		Route::get('car-city-create',             'CityController@getAddCity');
		Route::post('addcity',            'CityController@postAddCity');
		Route::get('car-citylist',            'CityController@getAllCity');
		Route::get('car-city-update/{id}',       'CityController@getEditCity');
		Route::post('updatecity/{id}',    'CityController@postEditCity');
		Route::post('delcities',          'CityController@postdelCity');
		Route::get('deletecity/{id}',     'CityController@getDeleteCity');
		Route::resource('searchcity',         'CityController@postSearchCity');

		Route::get('car-ingredient-create',             'IngredientController@getAddIngredient');
		Route::post('addingredient',            'IngredientController@postAddIngredient');
		Route::get('car-ingredientlist',            'IngredientController@getAllIngredient');
		Route::get('car-ingredient-update/{id}',       'IngredientController@getEditIngredient');
		Route::post('updateingredient/{id}',    'IngredientController@postEditIngredient');
		Route::post('delingredients',          	'IngredientController@postdelIngredient');
		Route::get('deleteingredient/{id}',     'IngredientController@getDeleteIngredient');
		Route::resource('searchingredient',         'IngredientController@postSearchIngredient');

		Route::get('contact-us-create',        'ContactController@getAddcontact');
		Route::post('addcontactus',            'ContactController@postAddcontact');
		Route::get('contact-us-list',          'ContactController@showcontactuslist');
		Route::get('contact-us-update/{id}',   'ContactController@getEditcontactus');
		Route::post('updatecontactus/{id}',    'ContactController@postEditcontactus');
		Route::post('delcontactus',            'ContactController@postdelcontactus');
		Route::get('deletecontactus/{id}',     'ContactController@getDeletcontactus');
		Route::resource('contact-us-search',       'ContactController@postSearcontactus');

		Route::get('car-article-create',     'ArticleController@getAddArticle');
		Route::post('addarticle',            'ArticleController@postAddArticle');
		Route::get('car-articlelist',        'ArticleController@showArticlelist');
		Route::get('car-article-update/{id}','ArticleController@getEditArticle');
		Route::post('updatearticle/{id}',    'ArticleController@postEditArticle');
		Route::post('delarticle',            'ArticleController@postdelArticle');
		Route::get('deletearticle/{id}',     'ArticleController@getDeleteArticle');
		Route::resource('car-article-search',    'ArticleController@postSearchArticle');

		Route::get('car-article-category-create',       'ArticleCategoryController@getAddArticleCategory');
		Route::post('addarticlecategory',            	'ArticleCategoryController@postAddArticleCategory');
		Route::get('car-article-categorylist',          'ArticleCategoryController@showArticleCategorylist');
		Route::get('car-article-category-update/{id}',  'ArticleCategoryController@getEditArticleCategory');
		Route::post('updatarticlecategory/{id}',    	'ArticleCategoryController@postEditArticleCategory');
		Route::post('deletearticlecategories',          'ArticleCategoryController@postdelArticleCategory');
		Route::get('deletearticlecategory/{id}',     	'ArticleCategoryController@getDeleteArticleCategory');
		Route::resource('car-article-category-search',      'ArticleCategoryController@postSearchArticleCategory');

		

		Route::get('car-model-create',      'ModelsController@getAddModels');
		Route::post('addmodel',            	'ModelsController@postAddModels');
		Route::get('car-modellist',         'ModelsController@getAllModels');
		Route::get('car-model-update/{id}',       	'ModelsController@getEditModels');
		Route::post('updatemodel/{id}',    	'ModelsController@postEditModels');
		Route::post('delmodels',            	'ModelsController@postdelModels');
		Route::get('deletemodel/{id}',     	'ModelsController@getDeleteModels');
		Route::resource('searchmodels',         'ModelsController@postSearchModels');

		Route::get('businessguide-create',         'BusinessGuideController@getAddBusinessGuide');
		Route::post('addbusinessguide',            'BusinessGuideController@postAddBusinessGuide');
		Route::get('businessguidelist',            'BusinessGuideController@getAllBusinessGuide');
		Route::get('businessguide-update/{id}',    'BusinessGuideController@getEditBusinessGuide');
		Route::post('updatebusinessguide/{id}',    'BusinessGuideController@postEditBusinessGuide');
		Route::post('delbusinessguide',            'BusinessGuideController@postdelBusinessGuide');
		Route::get('deletebusinessguide/{id}',     'BusinessGuideController@getDeleteBusinessGuide');
		Route::resource('businessguide-search',         'BusinessGuideController@postSearchBusinessGuide');

		Route::get('business-category-create',        'BusinessCategoryController@getAddBusinessCategory');
		Route::post('addbusinesscategory',            'BusinessCategoryController@postAddBusinessCategory');
		Route::get('business-categorylist',           'BusinessCategoryController@getAllBusinessCategory');
		Route::get('business-category-update/{id}',   'BusinessCategoryController@getEditBusinessCategory');
		Route::post('updatebusinesscategory/{id}',    'BusinessCategoryController@postEditBusinessCategory');
		Route::post('delbusinesscategories',          'BusinessCategoryController@postdelBusinessCategories');
		Route::get('deletebusinesscategory/{id}',     'BusinessCategoryController@getDeleteBusinessCategory');
		Route::resource('business-category-search',       'BusinessCategoryController@postSearchBusinessCategory');

		Route::get('news-create',        			'NewsController@getAddNews');
		Route::post('addnews',            			'NewsController@postAddNews');
		Route::get('newslist',           			'NewsController@getAllNews');
		Route::get('news-update/{id}',   			'NewsController@getEditNews');
		Route::post('updatenews/{id}',    			'NewsController@postEditNews');
		Route::post('deletenews',        			'NewsController@postdelNews');
		Route::get('deletenews/{id}',     			'NewsController@getDeleteNews');
		Route::resource('news-search',       		'NewsController@postSearchNews');
		
		Route::get('advertisement-create',         'AdvertisementController@getAddAdvertisement');
		Route::post('addadvertisement',            'AdvertisementController@postAddAdvertisement');
		Route::get('advertisementlist',            'AdvertisementController@getAllAdvertisement');
		Route::get('advertisement-update/{id}',    'AdvertisementController@getEditAdvertisement');
		Route::post('updateadvertisement/{id}',    'AdvertisementController@postEditAdvertisement');
		Route::post('deladvertisements',           'AdvertisementController@postdelAdvertisement');
		Route::get('deleteadvertisement/{id}',     'AdvertisementController@getDeleteAdvertisement');
		Route::resource('advertisement-search',        'AdvertisementController@postSearchAdvertisement');
	});

/*Route::filter('guest',              'UserController@filterguest');
Route::filter('auth',               'UserController@filterauth');*/
Route::get('register',              'UserController@adduser1');
Route::get('imeauto',           	array('as'=>'imeauto','uses'=>'UserController@getLogin'))->before('guest');
Route::post('imeauto',          	'UserController@postLogin');
Route::get('users-logout',                array('as'=>'logout','uses'=>'UserController@getLogout'))->before('auth');   


Route::get('/404', function()
{
    return View::make('error.404');
});
Route::get('/500', function()
{
    return View::make('error.500');
});




// Routes for Mobile API
Route::get('car/bycat/{userid}',		'MobileController@getcarlistbyuserid');
Route::get('carlists', 					'MobileController@getcarlistinfo');
Route::get('carlists/search', 			'MobileController@getsearch');

// Route::get('carid/{id}',				'MobileController@getcarbycarid');
Route::get('carid/{id}',				'MobileController@getcarbyid'); 
Route::get('car/{id}',					'MobileController@getcarbyuserid');
Route::get('car/{id}',					'MobileController@deletecarid');
Route::post('car/update/{id}',			'MobileController@postUpdateCar');
Route::put('carlists',					'MobileController@carlist');
Route::get('carlists/{linkparas?}', 	'MobileController@getsearchcars')->where('linkparas', '(.*)');
Route::post('upload/car',				'MobileController@postpicture');	//for picture upload
Route::post('car',						'MobileController@postcarcreate');

Route::get('carassociation',		'MobileController@getcarassociation');
// Route::get('carlist/{linkparas?}', 	'MobileController@getsearchcars')->where('linkparas', '(.*)');

Route::get('bodylists',					'MobileController@getbodylist');
Route::get('colorlists',				'MobileController@getcolorlist');
Route::get('countrylist',				'MobileController@getcountrylist');
Route::get('conditionlist',				'MobileController@getconditionlist');
Route::get('country',					'MobileController@getcountrylist');
Route::get('fuellist',					'MobileController@getfuellist');
Route::get('translist',					'MobileobileController@gettranslist');

Route::get('geolist',					'MobileController@getgeolist');

Route::get('newslists',					'MobileController@getnewslist');
Route::get('newlists/{type}',			'MobileController@getnewsbytype');
Route::get('makelists',					'MobileController@getmakelist');
Route::get('makelists/{catid}',			'MobileController@getmakebycatlist');

Route::get('enginepowers',				'MobileController@getenginepower');

Route::get('makelistsbycatid/{catid}',  	'MobileController@getmakebycatlist');
Route::get('modellistsbymakeid/{makeid}',	'MobileController@getmodelbymakelist');
Route::get('mycar',							'MobileController@getmycar');


Route::get('modellist',					'MobileController@getmodellist');
Route::get('modellist/{makeid}',		'MobileController@getmodelbymakelist');
Route::get('translist', 				'MobileController@gettransmissionlist');

Route::get('matchmodellist/{makeid}', 	'MobileController@getmodellistbybrand');

Route::get('user/{id}',				'MobileController@getuserbyid');
Route::post('user',					'MobileController@postuserregister');
Route::post('user/login',			'MobileController@postuserlogin');
Route::post('user/edit',			'MobileController@postuseredit');

// Route::get('carlists', 				'MobileController@getcarlist');

// Route::post('carlists', 				'MobileController@postcarcreate');
// Route::post('carlists', 				'MobileController@postcarcreate');
Route::post('carinmm','carinmm@carlists');
Route::post('oldcar','oldcar@carlists');
Route::post('cifob','fob@carlists');
Route::post('slip','slip@carlists');


/*Route::get('carlist/(:num)','searh@listcar');
Route::get('carlist/(:num)/(:num)','searh@listcar');
Route::get('carlist/(:num)/(:num)/(:num)','searh@listcar');*/

Route::post('oauth/access_token', function()
{
    return AuthorizationServer::performAccessTokenFlow();
});

Route::get('/oauth/authorize', array('before' => 'check-authorization-params|auth', function()
{
    // get the data from the check-authorization-params filter
    $params = Session::get('authorize-params');

    // get the user id
    $params['user_id'] = Auth::user()->id;

    // display the authorization form
    return View::make('authorization-form', array('params' => $params));
}));

Route::post('/oauth/authorize', array('before' => 'check-authorization-params|auth|csrf', function()
{
	
    // get the data from the check-authorization-params filter
    $params = Session::get('authorize-params');

    // get the user id
    $params['user_id'] = Auth::user()->id;

    // check if the user approved or denied the authorization request
    if (Input::get('approve') !== null) {

        $code = AuthorizationServer::newAuthorizeRequest('user', $params['user_id'], $params);

        Session::forget('authorize-params');

        return Redirect::to(AuthorizationServer::makeRedirectWithCode($code, $params));
    }

    if (Input::get('deny') !== null) {
        Session::forget('authorize-params');

        return Redirect::to(AuthorizationServer::makeRedirectWithError($params));
    }
}));