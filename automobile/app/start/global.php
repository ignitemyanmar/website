<?php

/*
|--------------------------------------------------------------------------
| Register The Laravel Class Loader
|--------------------------------------------------------------------------
|
| In addition to using Composer, you may use the Laravel class loader to
| load your controllers and models. This is useful for keeping all of
| your classes in the "global" namespace without Composer updating.
|
*/

ClassLoader::addDirectories(array(

	app_path().'/commands',
	app_path().'/controllers',
	app_path().'/models',
	app_path().'/database/seeds',

));

/*
|--------------------------------------------------------------------------
| Application Error Logger
|--------------------------------------------------------------------------
|
| Here we will configure the error logger setup for the application which
| is built on top of the wonderful Monolog library. By default we will
| build a rotating log file setup which creates a new file each day.
|
*/

$logFile = 'log-'.php_sapi_name().'.txt';

Log::useDailyFiles(storage_path().'/logs/'.$logFile);

/*
|--------------------------------------------------------------------------
| Application Error Handler
|--------------------------------------------------------------------------
|
| Here you may handle any errors that occur in your application, including
| logging them or displaying custom views for specific errors. You may
| even register several error handlers to handle different types of
| exceptions. If nothing is returned, the default error view is
| shown, which includes a detailed stack trace during debug.
|
*/

App::error(function(Exception $exception, $code)
{
	Log::error($exception);
	switch ($code)
	{
	    case 403:
	        return Response::view('errors.403', array(), 403);

	    case 404:
	        return Redirect::to('404');

	    case 500:
	    	return '<p style="border:1px solid #ccc; color:#888; padding:29px; width:70%; margin:0 auto;">  '.substr($exception,35, 180).'</p>';
	        return Redirect::to('500');

	    default:
	        return Response::view('errors.index', array(), $code);
	}
});

/*
|--------------------------------------------------------------------------
| Maintenance Mode Handler
|--------------------------------------------------------------------------
|
| The "down" Artisan command gives you the ability to put an application
| into maintenance mode. Here, you will define what is displayed back
| to the user if maintenace mode is in effect for this application.
|
*/

App::down(function()
{
	return Response::make("Be right back!", 503);
});

App::before(function($request)
{
    // Singleton (global) object
    App::singleton('myApp', function(){
        $app = new stdClass;
        /*if (Auth::check()) {
            // Put your User object in $app->user
            $app->user = Auth::User();
            $app->isLogedin = TRUE;
        }
        else {
            $app->isLogedin = FALSE;
        }*/
        $app->cardetail='';
        return $app;
    });
    $app = App::make('myApp');
    View::share('myApp', $app);
});

/*
|--------------------------------------------------------------------------
| Require The Filters File
|--------------------------------------------------------------------------
|
| Next we will load the filters file for the application. This gives us
| a nice separate location to store our route and application filter
| definitions instead of putting them all in the main routes file.
|
*/

require app_path().'/filters.php';