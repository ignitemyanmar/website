<?php

class MakeController extends BaseController
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
    public function getAddMake()
    {                       
        return View::make('make.add');
    }
	
    /**
     * Stores new Banner
     *
     */
    public function postAddMake()
    {       
        $Make=new Make();
        $Make->make=Input::get('make');     
        $Make->image=Input::get('gallery1');     
        $result=$Make->save();
     
                
        return Redirect::to('/car-makelist');
        
    }

    /**
    *   To get edit banner page
    */
    public function getEditcarmake($id)
    {
                
        return \View::make('make.edit')->with('make',Make::find($id));
    }

    /**************
    *   To Update data of banner info;
    */
    
    public function postEditcarmake($id)
    {
        $Make=Make::find($id);
        $image=Input::get('gallery1');
        $oldfile=Input::get('hdimage');
        $Make->image=$image ? $image : $oldfile;
        $Make->make=Input::get('make');     
        $result=$Make->save();
        return Redirect::to('car-makelist');
    }

 
    public function getDeletecarmake($id)
    {           
            
            $affectedRows1 = Make::where('id', '=', $id)->delete();
            
             return Redirect::to('/car-makelist');
            
    }

    public function postdelcarmake()
    {           
           $todeleterecorts=Input::get('recordstoDelete');
           if(count($todeleterecorts) == 0)
          {
            return Redirect::to("/car-makelist");
          }
           
            foreach ($todeleterecorts as $recid) 
            {
                
                $result = Make::where('id', '=', $recid)->delete();
                
            }
            return Redirect::to("/car-makelist");
    }

     public function getAllCarmake()
    {
       $makes= Make::orderBy('id', 'DESC')                
                ->paginate(15);
        $count=count(Make::all());
        return \View::make('make.list')->with('makes', $makes)->with('count',$count);
    }

    
    public function postSearchCarmake()
    {
            $keyword =Input::get('keyword');            
            $makes = Make::where('make','LIKE','%' . $keyword . '%')
                        ->orderBy('id', 'DESC')->paginate(10);
           $count=count($makes);
            return \View::make('make.list')->with('makes', $makes)->with('count',$count);
    
        
    }

    public function getShow($id){
        $objmake=Make::find($id);
        if($objmake){
            $objmake->status=1;
            $objmake->update();
        }
        return Redirect::to('car-makelist');
    }

    public function getHide($id){
        $objmake=Make::find($id);
        if($objmake){
            $objmake->status=0;
            $objmake->update();
        }
        return Redirect::to('car-makelist');
    }
    

}