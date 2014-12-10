<?php
class HomeController extends BaseController {

	public function getIndex()
	{
		$response=array();
		$aboutus=AboutUs::orderBy('id','desc')->first();
		$language=Session::get('language') ? Session::get('language') : "english";
		if($language=='japan')
			$seminar=Seminar::where('language_id','=',1)->with(array('images'))->orderBy('id','desc')->limit(2)->get();
		elseif($language=='english')
			$seminar=Seminar::where('language_id','=',3)->with(array('images'))->orderBy('id','desc')->limit(2)->get();
		else
			$seminar=Seminar::where('language_id','=',2)->with(array('images'))->orderBy('id','desc')->limit(2)->get();
		$news_events=NewsEvents::orderBy('id','desc')->limit(8)->get();
		$response['aboutus']=$aboutus;

		if($seminar){
			$i=0;
			foreach ($seminar as $row) {
				$seminar[$i]['image']=SeminarImages::whereseminar_id($row->id)->pluck('images');	
				$i++;
			}
		}

		$response['seminar']=$seminar;
		$response['news_events']=$news_events;

		$banner=Banner::orderBy('id','desc')->limit(9)->get();
		$response['banner']=$banner;


		$language=Session::has('language') ? Session::get('language') : 'english';
		if($language=="english")
		{
			$about_title="About MJBC";
			$new_event_title="News & Events";
			$more="More";
			$email="Email";
			$password="Password";
			$photo="Photos";
			$login="Login";
		}		
		else if($language=="japan")
		{
			$about_title="MJBCについて";
			$new_event_title="ニュース＆イベント";
			$more="続き";
			$email="Eメール";
			$password="パスワード";
			$photo="写真";
			$login="ログイン";
		}
		else
		{
			$about_title="MJBC အေၾကာင္း";
			$new_event_title="သတင္းႏွင့္ပြဲမ်ား";
			$more="အေသးစိတ္ၾကည့္ရန္";
			$email="အီးေမး";
			$password="လ်ိဳ႕ဝွက္နံပါတ္";
			$photo="ဓါတ္ပုံမ်ား";
			$login="ဝင္ရန္";
		}

		return View::make('home.index', array(
								'response' => $response,
								'about_title' => $about_title,
								'new_event_title' => $new_event_title,
								'more' => $more,
								'email' => $email,
								'password' => $password,
								'photo' => $photo,
								'language' => $language,
								'login' => $login
								));
	}

	public function getSearch(){
		$language=Session::get('language') ? Session::get('language') : "english";
		$oldlanguage=Session::get('oldlanguage') ? Session::get('oldlanguage') : "";


		$search=Input::get('search');
		if($search){
			Session::put('search',$search);
		}else{
			$search=Session::get('search');
		}
		$language_id=Language::wherename($language)->pluck('id');
		$oldlanguage_id=Language::wherename($oldlanguage)->pluck('id');
		$seminar=array();
		if($oldlanguage !='' && $oldlanguage !=$language){
			$org_lan_codeno=Seminar::wherelanguage_id($oldlanguage_id)->where('name','like','%'.$search.'%')->orwhere('physician','like','%'.$search.'%')->lists('code_no');
			if($org_lan_codeno)
			$seminar=Seminar::wherelanguage_id($language_id)->wherein('code_no',$org_lan_codeno)->paginate(8);
		}else{
			// dd('ab');
			// $org_lan_codeno=Seminar::wherelanguage_id($oldlanguage_id)->where('name','like','%'.$search.'%')->orwhere('physician','like','%'.$search.'%')->paginate(8)->lists('code_no');
			$seminar=Seminar::wherelanguage_id($language_id)->where('name','like','%'.$search.'%')->orwhere('physician','like','%'.$search.'%')->paginate(8);
			// $seminar=Seminar::wherein('code_no',$org_lan_codeno)->paginate(8);
		}
		

		$banner=Banner::orderBy('id','desc')->limit(9)->get();
		$response['banner']=$banner;
		if($seminar){
			$i=0;
			foreach ($seminar as $row) {
				$seminar[$i]['image']=SeminarImages::whereseminar_id($row->id)->pluck('images');	
				$i++;
			}
		}
		// return Response::json($response['seminar']);
		return View::make('home.search', array('responses'=>$response, 'response'=>$seminar,'title'=>$search, 'type'=>'seminar', 'language'=>$language));
	}

	public function getSchedule(){
		$response=array();
		$response=Seminar::with(array('seminartype','time_table'))->get();
		// return Response::json($response);
		return View::make('home.schedule', array('response'=>$response));
	}
	public function getSchedulenew(){
		$response=array();
		$objseminar=SeminarType::all();
		if($objseminar){
			$j=0;
			foreach ($objseminar as $row) {
				$temp=Seminar::whereseminar_type_id($row->id)->with(array('time_table'))->get();
				$objseminar[$j]['courses']=$temp->toarray();
				$j++;
			}
		}
		// return Response::json($objseminar);
			
		// $response=Seminar::with(array('seminartype','time_table'))->get();
		// return Response::json($response);
		return View::make('home.schedulenew', array('response'=>$objseminar));
	}


	public function getNewsEvents(){
		$response=NewsEvents::orderBy('id','desc')->paginate(12);
		$title="News & Events";
		$language=Session::get('language') ? Session::get('language') : 'english'; 
		if($language=='japan'){
			$title="ニュース/イベント";
		}elseif($language=="myanmar"){
					$title="သတင္းႏွင့္ပြဲမ်ား";
		}else{
			$title="News / Events";
		}
		// return Response::json($response);
		return View::make('news_events.index', array('response'=>$response, 'type'=>$title, 'title'=>$title,'language'=>$language));
	}

	public function getNewsEventsDetail($id, $title){
		$response=NewsEvents::whereid($id)->first();
		$title="News & Events";
		$language=Session::get('language') ? Session::get('language') : 'english'; 
		if($language=='japan'){
			$title="ニュース/イベント";
		}elseif($language=="myanmar"){
					$title="သတင္းႏွင့္ပြဲမ်ား";
		}else{
			$title="News / Events";
		}
		// return Response::json($response);
		return View::make('news_events.detail', array('response'=>$response, 'type'=>$title, 'title'=>$title,'language'=>$language));
	}

	public function getMenuCategory($lan, $type){
		$banner=Banner::orderBy('id','desc')->limit(9)->get();
		$responses['banner']=$banner;

		$language=Session::get('language') ? Session::get('language') : "english";
		$response=array();
		switch ($type) {
			case 'seminar':
				if($language=="english"){
					$response=Seminar::wherecategory('Seminar')->where('language_id','=',3)->orderBy('id','desc')->paginate(12);
				}elseif($language=="japan"){
					$response=Seminar::wherecategory('Seminar')->where('language_id','=',1)->orderBy('id','desc')->paginate(12);
				}else{
					$response=Seminar::wherecategory('Seminar')->where('language_id','=',2)->orderBy('id','desc')->paginate(12);
				}
				break;
			case 'consultancy':
				if($language=="english"){
					$response=Seminar::wherecategory('Consultancy')->where('language_id','=',3)->orderBy('id','desc')->paginate(12);
				}elseif($language=="japan"){
					$response=Seminar::wherecategory('Consultancy')->where('language_id','=',1)->orderBy('id','desc')->paginate(12);
				}else{
					$response=Seminar::wherecategory('Consultancy')->where('language_id','=',2)->orderBy('id','desc')->paginate(12);
				}
				break;
			case 'executivesearch':
				$type="Executive Search";
				if($language=="english"){
					$response=Seminar::wherecategory('Executive Search')->where('language_id','=',3)->orderBy('id','desc')->paginate(12);
				}elseif($language=="japan"){
					$response=Seminar::wherecategory('Executive Search')->where('language_id','=',1)->orderBy('id','desc')->paginate(12);
				}else{
					$response=Seminar::wherecategory('Executive Search')->where('language_id','=',2)->orderBy('id','desc')->paginate(12);
				}
				break;
			case 'news-event':
				$type="News/ Events";
				$response=NewsEvents::orderBy('id','asc')->paginate(12);
				break;
			default:
				# code...
				break;
		}
		if($response){
			$i=0;
			foreach ($response as $row) {
				$response[$i]['image']=SeminarImages::whereseminar_id($row->id)->pluck('images');	
				$i++;
			}
		}
		$title=$type;
		$language=Session::get('language') ? Session::get('language') : 'english'; 
		if($language=='japan'){
			switch ($type) {
				case 'consultancy':
					$title="コンサルタント業";
					break;
				case 'seminar':
					$title="セミナー";
					break;
				case 'Executive Search':
					$title="エグゼクティブサーチ";
					break;	
				case 'News/ Events':
					$title="ニュース/イベント";
					break;					
				default:
					$title=$type;
					break;
			}
			
		}elseif($language=="myanmar"){
			switch ($type) {
				case 'consultancy':
					$title="အတုိင္ပင္ခံလုပ္ငန္း";
					break;
				case 'seminar':
					$title="ေဆြးေႏြးပြဲမ်ား";
					break;
				case 'Executive Search':
					$title="Executive Search";
					break;	
				case 'News/ Events':
					$title="ပြဲႏွင့္သတင္းမ်ား";
					break;					
				default:
					$title=$type;
					break;
			}
		}else{
			switch ($type) {
				case 'consultancy':
					$title="Consultancy";
					break;
				case 'seminar':
					$title="Seminar";
					break;
				case 'Executive Search':
					$title="Executive Search";
					break;	
				case 'News/ Events':
					$title="News / Events";
					break;					
				default:
					$title=$type;
					break;
			}
		}
		// return Response::json($response);
		return View::make('home.category',array('response'=>$response, 'type'=>$type, 'title'=>$title,'language'=>$language,'responses'=>$responses));
	}


	public function getDetail($lan,$type,$id, $title){
		$oldlanguage=Session::get('oldlanguage') ? Session::get('oldlanguage') : "";
		$oldlanguage_id=Language::wherename($oldlanguage)->pluck('id');
		$language=Session::get('language') ? Session::get('language') : "english";
		$language_id=Language::wherename($language)->pluck('id');

		if($oldlanguage !='' && $oldlanguage !=$language){
			$code_no=Seminar::whereid($id)->pluck('code_no');
			$response=Seminar::wherecode_no($code_no)->wherelanguage_id($language_id)->with(array('images','time_table'))->first();
		}else{
			$response=Seminar::whereid($id)->with(array('images','time_table'))->first();
		}

		/*$type=str_replace('-','/',$type);
		switch ($type) {
			case 'seminar':
				$response=Seminar::whereid($id)->with(array('images','time_table'))->first();
				break;
			case 'consultancy':
				$response=Seminar::whereid($id)->with(array('images'))->first();
				break;
			case 'Executive Search':
				// $type="Executive Search";
				$response=Seminar::whereid($id)->with(array('images'))->first();
				break;
			default:
				$response=array();
				# code...
				break;
		}*/
		// return Response::json($response);
		return View::make('home.detail', array('response'=>$response,'language'=>$language));

	}

	public function getFaq($lan){
		$response=array();
		return View::make('home.faq',array('response'=>$response));
	}

	public function getAboutUs($lan){
		$response=array();
		return View::make('home.aboutus',array('response'=>$response));
	}

	public function getContactUs($lan){
		$response=array();
		return View::make('home.contactus', array('response'=>$response));
	}

}