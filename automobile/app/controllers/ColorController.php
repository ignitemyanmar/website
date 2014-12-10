<?php

class ColorController extends BaseController
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
    public function getAddColor()
    {                       
        return View::make('color.add');
    }
	
    /**
     * Stores new Banner
     *
     */
    public function postAddColor()
    {       
        $Color=new Color();
        $maxid=Color::max('id');
        if($maxid==null)$maxid=1;
        else  $maxid +=1;   
        $Color->id=$maxid;
        $Color->name=Input::get('name');     
        $result=$Color->save();

       
        if ( $result )
        {          
             return Redirect::to('/car-colorlist');
        }
        else
        {
            // Get validation errors (see Ardent package)
            $error = $Color->errors()->all();

            return View::make('color.list');
        }
    }

    /**
    *   To get edit banner page
    */
    public function getEditColor($id)
    {
                
        return \View::make('color.edit')->with('color',Color::find($id));
    }

    /**************
    *   To Update data of banner info;
    */
    
    public function postEditColor($id)
    {


        $bodytype=new Color();

       
       $affectedRows = Color::where('id', '=', $id)->update(array(
                    'name'=>Input::get('name') ? Input::get('name') : "",                     
                                                       
                    ));
       
         
        return Redirect::to('car-colorlist');
    }

 
    public function getDeleteColor($id)
    {           
            
            $affectedRows1 = Color::where('id', '=', $id)->delete();
            
             return Redirect::to('/car-colorlist');
            
    }

    public function postdelColor()
    {           
           $todeleterecorts=Input::get('recordstoDelete');
           if(count($todeleterecorts) == 0)
          {
            return Redirect::to("/car-colorlist");
          }
           
            foreach ($todeleterecorts as $recid) 
            {
                
                $result = Color::where('id', '=', $recid)->delete();
                
            }
            return Redirect::to("/car-colorlist");
    }

     public function getAllColor()
    {
       $colors= Color::orderBy('id', 'DESC')                
                ->paginate(15);
        $count=count(Color::all());
        return \View::make('color.list')->with('colors', $colors)->with('count',$count);
    }

    
    public function postSearchColor()
    {
            $keyword =Input::get('keyword');            
            $colors = Color::where('name','LIKE','%' . $keyword . '%')
                        ->orderBy('id', 'DESC')->paginate(10);
           $count=count($colors);
            return \View::make('color.list')->with('colors', $colors)->with('count',$count);
    
        
    }
    

}