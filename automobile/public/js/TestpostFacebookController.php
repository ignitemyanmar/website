<?php
class TestpostFacebookController extends BaseController {
	public function getIndex()
	{
	    // Use a single object of a class throughout the lifetime of an application.
		$application = array(
	    'appId' => '892940950721218',
	    'secret' => '862868d817a8341c33248f15bcf638b0'
	    );
		$permissions = 'publish_stream';
		$url_app = 'http://www.automobile.com.mm';

		// getInstance
		FacebookConnect::getFacebook($application);
		$getUser = FacebookConnect::getUser($permissions, $url_app); // Return facebook User data
		dd($getUser);
		
		var_dump($getUser);

		$message = array(
		    'link'    => 'http://automobile.com.mm/demo',
		    'message' => 'Car Design',
		    'picture'   => 'http://automobile.com.mm/carimagesm/buy.jpg',
		    'name'    => 'Car Photo',
		    'description' => 'Beauty Car',
		    'access_token' => $getUser['access_token'] // form FacebookConnect::getUser();
		    );
		FacebookConnect::postToFacebook($message, 'feed'); // return feed id 1330355140_102030093014XXXXX
	}
}
