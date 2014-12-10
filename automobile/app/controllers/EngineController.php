<?php

class EngineController extends BaseController
{

	/*
	|--------------------------------------------------------------------------
	| Default  Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'BannerController@create');
	|
	*/

	 /**
     *  
     * @var 
     */
    public function getAddEngine()
    {                       
        return View::make('enginepower.add');
    }
	
    /**
     * Stores new 
     *
     */
    public function postAddEngine()
    {       
        $name=Input::get('name');
        $Engine=new EnginePower();
        $check_exiting=EnginePower::wherename($name)->first();
        if($check_exiting){
            $message['status']=1;
            $message['info']="This Record is alredy exit.";
            return Redirect::to('car-enginelist')->with('message', $message);    
        }
        $Engine->name=$name;     
        $Engine->save();
            $message['status']=1;
            $message['info']="Successfully save one record.";
            return Redirect::to('car-enginelist')->with('message', $message);
    }

    /**
    *   To get edit  page
    */
    public function getEditEngine($id)
    {
                
        return \View::make('enginepower.edit')->with('engine',EnginePower::find($id));
    }

    /**************
    *   To Update data of  info;
    */
    
    public function postEditEngine($id)
    {
        $name=Input::get('name');
        $check_exiting=EnginePower::wherename($name)->where('id','!=', $id)->first();
        if($check_exiting){
            $message['status']=0;
            $message['info']="Update fail, this name same with exiting record.";
            return Redirect::to('car-enginelist')->with('message', $message);    
        }
        EnginePower::where('id', '=', $id)->update(array(
                    'name'=>$name,                     
                    ));
        $message['status']=0;
        $message['info']="Successfully update record."; 
        return Redirect::to('car-enginelist')->with('message', $message);    
    }

 
    public function getDeleteEngine($id)
    {           
        $check_exiting=Car::whereenginepower_id($id)->first();
        if($check_exiting){
            $message['status']=0;
            $message['info']="You can't delete this record, has link with cars.";
            return Redirect::to('car-enginelist')->with('message',$message);
        }  

        $affectedRows1 = EnginePower::where('id', '=', $id)->delete();
        $message['status']=0;
        $message['info']="Successfully delete one record.";
        return Redirect::to('/car-enginelist')->with('message',$message);
            
    }

    public function postdelEngine()
    {           
           $todeleterecorts=Input::get('recordstoDelete');
           if(count($todeleterecorts) == 0)
          {
            return Redirect::to("/car-enginelist");
          }
           
            foreach ($todeleterecorts as $recid) 
            {
                
                $result = EnginePower::where('id', '=', $recid)->delete();
                
            }
            return Redirect::to("/car-enginelist");
    }

     public function getAllEngine()
    {
       $enginepowers= EnginePower::orderBy('id', 'DESC')                
                ->paginate(15);
        $count=EnginePower::count();
        return \View::make('enginepower.list', array('enginepowers'=>$enginepowers, 'count'=> $count));
    }

    
    public function postSearchEngine()
    {
            $keyword =Input::get('keyword');            
            $enginepowers = EnginePower::where('name','LIKE','%' . $keyword . '%')
                        ->orderBy('id', 'DESC')->paginate(10);
           $count=count($enginepowers);
            return \View::make('enginepower.list')->with('enginepowers', $enginepowers)->with('count',$count);
    
        
    }
    

}