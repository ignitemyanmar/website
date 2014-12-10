<?php
class TestpostFacebookController extends BaseController {
	public function getIndex()
	{
        $application = array(
		    'appId' => '892940950721218', //572699629418497',
		    'secret' => '862868d817a8341c33248f15bcf638b0'//80d93406274b0acfd1b5aac3a6f492d2'
		    );
		$permissions = 'publish_stream';
		$url_app = 'www.mmjunction.com';

		$temp=FacebookConnect::getFacebook($application);
		$getUser = FacebookConnect::getUser($permissions, $url_app); // Return facebook User data

		$message = array(
		    'link'    => 'https://apps.facebook.com/automobile_car_info',
		    'message' => 'Latest model Car. ',
		    'picture'   => 'http://automobilemm.dev/banner/1610car6.jpg',
		    'name'    => 'Car Design',
		    'description' => 'Beauty Car',
		    'access_token' => $getUser['access_token'] // form FacebookConnect::getUser();
		    );

		$feedid=FacebookConnect::postToFacebook($message, 'feed'); // return feed id 1330355140_102030093014XXXXX
		dd($feedid);

	}
}
