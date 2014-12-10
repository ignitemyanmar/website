<?php

class AdvertisementController extends BaseController
{

	/*
	|--------------------------------------------------------------------------
	| Default banner Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'BannerController@createbanner');
	|
	*/

	 /**
     * banner Model
     * @var banner
     */
    public function getAddAdvertisement()
    {                       
        return View::make('advertisement.add');
    }
	
    /**
     * Stores new Banner
     *
     */
    public function postAddAdvertisement()
    {       
        $advertisement=new Advertisement();
        $advertisement->weblink=Input::get('weblink');     
        $advertisement->image=Input::get('gallery1');     
        $advertisement->position=Input::get('position');     
        $advertisement->description=Input::get('description');     
        $result=$advertisement->save();
        return Redirect::to('advertisementlist');
    }

    /**
    *   To get edit banner page
    */
    public function getEditAdvertisement($id)
    {
        return \View::make('advertisement.edit')->with('advertisement',Advertisement::find($id));
    }

    /**************
    *   To Update data of banner info;
    */
    
    public function postEditAdvertisement($id)
    {
        $Advertisement=Advertisement::find($id);
        $image=Input::get('gallery1');
        $oldfile=Input::get('hdimage');
        $Advertisement->image=$image ? $image : $oldfile;
        $Advertisement->weblink=Input::get('weblink');     
        $Advertisement->position=Input::get('position');    
        $Advertisement->description=Input::get('description');     
        $result=$Advertisement->save();
        return Redirect::to('advertisementlist');
    }

 
    public function getDeleteAdvertisement($id)
    {           
            $affectedRows1 = Advertisement::where('id', '=', $id)->delete();
            return Redirect::to('advertisementlist');
    }

    public function postdelAdvertisement()
    {           
           $todeleterecorts=Input::get('recordstoDelete');
           if(count($todeleterecorts) == 0)
          {
            return Redirect::to("advertisementlist");
          }
           
            foreach ($todeleterecorts as $recid) 
            {
                
                $result = Advertisement::where('id', '=', $recid)->delete();
                
            }
            return Redirect::to("advertisementlist");
    }

     public function getAllAdvertisement()
    {
       $Advertisements= Advertisement::orderBy('id', 'DESC')                
                ->paginate(15);
        $count=count(Advertisement::all());
        return \View::make('advertisement.list')->with('advertisements', $Advertisements)->with('count',$count);
    }

    
    public function postSearchAdvertisement()
    {
            $keyword =Input::get('keyword');            
            $Advertisements = Advertisement::where('position','LIKE','%' . $keyword . '%')
                        ->orderBy('id', 'DESC')->paginate(10);
           $count=count($Advertisements);
            return \View::make('advertisement.list')->with('advertisements', $Advertisements)->with('count',$count);
    
        
    }
    

    

}