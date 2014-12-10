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

Route::get('/demo', 							'HomeController@getIndex');
Route::get('sell-car', 						'CarController@getsellcar');
Route::get('/sell-car/my-vehicles',			'CarController@Carlists');
Route::get('/sell-car/add-new-vehicle',		'CarController@FormNewcar');
Route::get('/sell-car/my-profile',			'CarController@Dealerinfo');
Route::get('/imgdetail',					'CarController@imgdetail');

Route::get('buy-car', 						'CarController@getbuycar');
Route::get('buy-car/{type}', 				'CarController@getbuycarbytype');

Route::get('news', 							'NewsController@getIndex');
Route::get('news/{type}', 					'NewsController@getnewsbytype');

Route::get('articles', 						'ArticleController@getallarticle');
Route::get('articles/{type}', 				'ArticleController@getarticlebytype');
Route::get('articles/{type}/{title}', 		'ArticleController@getarticledetail');

Route::get('business-guide', 				'BusinessGuideController@getallbusiness');
Route::get('business-guide/{type}', 		'BusinessGuideController@getbusinessbytype');

Route::get('contact-us', 					'ContactController@getcontact');



Route::get('forgotpassword', 			'UserController@getforgotpassword');
Route::post('forgotpassword', 			'UserController@postforgotpassword');
Route::get('resetpassword/{email}/{randno}', 	'UserController@getresetpassword');
Route::post('resetpassword', 			'UserController@postresetpassword');

Route::group(array('before' => 'auth'), function()
		{

			Route::get('imeauto', 				array('as' => 'imeauto', function () {
		        return View::make('admin.login');
		    }));

		Route::post('image-upload/{folder}',           'UploadController@postFileUpload');

		/***
		*---------- User route--------------------
		*/
		Route::get('user-create',           'UserController@adduser');
		Route::post('addnewuser',       	'UserController@addnewuser');
		Route::get('userlist',				array('as'=>'listuser','uses'=>'UserController@listuser'));
		Route::get('edituser/{id}',     	'UserController@toedituser')->before('auth');
		Route::post('updateuser/{id}',  	'UserController@edituser');
		Route::get('deleteuser/{id}',   	'UserController@deluser')->before('auth');

		Route::get('car-create',            'CarController@getAddCar');
		Route::post('addnewcar',       		'CarController@postAddCar');
		Route::get('carlist',				'CarController@getCarlist');
		Route::get('car-update/{id}',     	'CarController@getEditCar');
		Route::post('car-update/{id}',  	'CarController@postUpdateCar');
		Route::get('deletecar/{id}',   		'CarController@getDeleteCar');
		Route::post('deleteusers',   		'CarController@postDeleteCars');


		Route::get('car-make-create',        'MakeController@getAddMake');
		Route::post('addcarmake',            'MakeController@postAddMake');
		Route::get('car-makelist',           'MakeController@getAllCarmake');
		Route::get('car-make-update/{id}',   'MakeController@getEditcarmake');
		Route::post('updatecarmake/{id}',    'MakeController@postEditcarmake');
		Route::post('delcarmakes',           'MakeController@postdelcarmake');
		Route::get('deletecarmake/{id}',     'MakeController@getDeletecarmake');
		Route::post('searchcarmake',         'MakeController@postSearchCarmake');

		Route::get('car-condition-create',     'ConditionController@getAddCondition');
		Route::post('addcondition',            'ConditionController@postAddCondition');
		Route::get('car-conditionlist',        'ConditionController@getAllCondition');
		Route::get('car-condition-update/{id}',       'ConditionController@getEditCondition');
		Route::post('updatecondition/{id}',    'ConditionController@postEditCondition');
		Route::post('delconditions',           'ConditionController@postdelcondition');
		Route::get('deletecondition/{id}',     'ConditionController@getDeleteCondition');
		Route::post('searchcondition',         'ConditionController@postSearchConditions');

		Route::get('car-body-create',           'BodyController@getAddBody');
		Route::post('addbody',            		'BodyController@postAddBody');
		Route::get('car-bodylist',            	'BodyController@getAllBody');
		Route::get('car-body-update/{id}',      'BodyController@getEditBody');
		Route::post('updatebody/{id}',    		'BodyController@postEditBody');
		Route::post('delBodys',           		'BodyController@postdelBody');
		Route::get('deleteBody/{id}',     		'BodyController@getDeleteBody');
		Route::post('searchBody',         		'BodyController@postSearchBody');

		Route::get('car-color-create',          'ColorController@getAddColor');
		Route::post('addcolor',            		'ColorController@postAddColor');
		Route::get('car-colorlist',             'ColorController@getAllColor');
		Route::get('car-color-update/{id}',     'ColorController@getEditColor');
		Route::post('updatecolor/{id}',    		'ColorController@postEditColor');
		Route::post('delcolors',           		'ColorController@postdelColor');
		Route::get('deletecolor/{id}',     		'ColorController@getDeleteColor');
		Route::post('searchcolor',         		'ColorController@postSearchColor');

		Route::get('car-city-create',             'CityController@getAddCity');
		Route::post('addcity',            'CityController@postAddCity');
		Route::get('car-citylist',            'CityController@getAllCity');
		Route::get('car-city-update/{id}',       'CityController@getEditCity');
		Route::post('updatecity/{id}',    'CityController@postEditCity');
		Route::post('delcities',          'CityController@postdelCity');
		Route::get('deletecity/{id}',     'CityController@getDeleteCity');
		Route::post('searchcity',         'CityController@postSearchCity');

		Route::get('car-ingredient-create',             'IngredientController@getAddIngredient');
		Route::post('addingredient',            'IngredientController@postAddIngredient');
		Route::get('car-ingredientlist',            'IngredientController@getAllIngredient');
		Route::get('car-ingredient-update/{id}',       'IngredientController@getEditIngredient');
		Route::post('updateingredient/{id}',    'IngredientController@postEditIngredient');
		Route::post('delingredients',          	'IngredientController@postdelIngredient');
		Route::get('deleteingredient/{id}',     'IngredientController@getDeleteIngredient');
		Route::post('searchingredient',         'IngredientController@postSearchIngredient');

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

		
		Route::get('modellist/{make}',      'ModelsController@getModelsByMake');

		Route::get('car-model-create',      'ModelsController@getAddModels');
		Route::post('addmodel',            	'ModelsController@postAddModels');
		Route::get('car-modellist',         'ModelsController@getAllModels');
		Route::get('car-model-update/{id}',       	'ModelsController@getEditModels');
		Route::post('updatemodel/{id}',    	'ModelsController@postEditModels');
		Route::post('delmodels',            	'ModelsController@postdelModels');
		Route::get('deletemodel/{id}',     	'ModelsController@getDeleteModels');
		Route::post('searchmodels',         'ModelsController@postSearchModels');

		Route::get('businessguide-create',         'BusinessGuideController@getAddBusinessGuide');
		Route::post('addbusinessguide',            'BusinessGuideController@postAddBusinessGuide');
		Route::get('businessguidelist',            'BusinessGuideController@getAllBusinessGuide');
		Route::get('businessguide-update/{id}',    'BusinessGuideController@getEditBusinessGuide');
		Route::post('updatebusinessguide/{id}',    'BusinessGuideController@postEditBusinessGuide');
		Route::post('delbusinessguide',            'BusinessGuideController@postdelBusinessGuide');
		Route::get('deletebusinessguide/{id}',     'BusinessGuideController@getDeleteBusinessGuide');
		Route::post('businessguide-search',         'BusinessGuideController@postSearchBusinessGuide');

		Route::get('business-category-create',        'BusinessCategoryController@getAddBusinessCategory');
		Route::post('addbusinesscategory',            'BusinessCategoryController@postAddBusinessCategory');
		Route::get('business-categorylist',           'BusinessCategoryController@getAllBusinessCategory');
		Route::get('business-category-update/{id}',   'BusinessCategoryController@getEditBusinessCategory');
		Route::post('updatebusinesscategory/{id}',    'BusinessCategoryController@postEditBusinessCategory');
		Route::post('delbusinesscategories',          'BusinessCategoryController@postdelBusinessCategories');
		Route::get('deletebusinesscategory/{id}',     'BusinessCategoryController@getDeleteBusinessCategory');
		Route::post('business-category-search',       'BusinessCategoryController@postSearchBusinessCategory');

		Route::get('news-create',        			'NewsController@getAddNews');
		Route::post('addnews',            			'NewsController@postAddNews');
		Route::get('newslist',           			'NewsController@getAllNews');
		Route::get('news-update/{id}',   			'NewsController@getEditNews');
		Route::post('updatenews/{id}',    			'NewsController@postEditNews');
		Route::post('delbusinesscategories',        'NewsController@postdelBusinessCategories');
		Route::get('deletenews/{id}',     			'NewsController@getDeleteNews');
		Route::post('news-search',       			'NewsController@postSearchNews');
		
		Route::get('advertisement-create',         'AdvertisementController@getAddAdvertisement');
		Route::post('addadvertisement',            'AdvertisementController@postAddAdvertisement');
		Route::get('advertisementlist',            'AdvertisementController@getAllAdvertisement');
		Route::get('advertisement-update/{id}',    'AdvertisementController@getEditAdvertisement');
		Route::post('updateadvertisement/{id}',    'AdvertisementController@postEditAdvertisement');
		Route::post('deladvertisements',           'AdvertisementController@postdelAdvertisement');
		Route::get('deleteadvertisement/{id}',     'AdvertisementController@getDeleteAdvertisement');
		Route::post('advertisement-search',        'AdvertisementController@postSearchAdvertisement');
	});

Route::filter('guest',              'UserController@filterguest');
Route::filter('auth',               'UserController@filterauth');
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

