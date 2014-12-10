<?php

class BodyController extends BaseController
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
    public function getAddBody()
    {                       
        return View::make('body.add');
    }
	
    /**
     * Stores new Banner
     *
     */
    public function postAddBody()
    {       
        $Body=new Body();
        $maxid=Body::max('id');
        if($maxid==null)$maxid=1;
        else  $maxid +=1;   
        $Body->id=$maxid;
        $Body->name=Input::get('name');     
        $result=$Body->save();

       
        if ( $result )
        {          
             return Redirect::to('/car-bodylist');
        }
        else
        {
            // Get validation errors (see Ardent package)
            $error = $Body->errors()->all();

            return View::make('body.list');
        }
    }

    /**
    *   To get edit banner page
    */
    public function getEditBody($id)
    {
                
        return \View::make('body.edit')->with('body',Body::find($id));
    }

    /**************
    *   To Update data of banner info;
    */
    
    public function postEditBody($id)
    {


        $Body=new Body();

       
       $affectedRows = Body::where('id', '=', $id)->update(array(
                    'name'=>Input::get('name') ? Input::get('name') : "",                     
                                                       
                    ));
       
         
        return Redirect::to('car-bodylist');
    }

 
    public function getDeleteBody($id)
    {           
            
            $affectedRows1 = Body::where('id', '=', $id)->delete();
            
             return Redirect::to('/car-bodylist');
            
    }

    public function postdelBody()
    {           
           $todeleterecorts=Input::get('recordstoDelete');
           if(count($todeleterecorts) == 0)
          {
            return Redirect::to("/Bodylist");
          }
           
            foreach ($todeleterecorts as $recid) 
            {
                
                $result = Body::where('id', '=', $recid)->delete();
                
            }
            return Redirect::to("/Bodylist");
    }

     public function getAllBody()
    {
       $ojjbodies= Body::orderBy('id', 'DESC')                
                ->paginate(15);
        $count=count(Body::all());
        return \View::make('body.list')->with('bodies', $ojjbodies)->with('count',$count);
    }

    
    public function postSearchBody()
    {
            $keyword =Input::get('keyword');            
            $ojjbodies = Body::where('name','LIKE','%' . $keyword . '%')
                        ->orderBy('id', 'DESC')->paginate(10);
           $count=count($ojjbodies);
            return \View::make('body.list')->with('bodies', $ojjbodies)->with('count',$count);
    
        
    }
    

}