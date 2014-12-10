<?php

class ConditionController extends BaseController
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
    public function getAddCondition()
    {                       
        return View::make('condition.add');
    }
	
    /**
     * Stores new Banner
     *
     */
    public function postAddCondition()
    {       
        $Condition=new Condition();
        $maxid=Condition::max('id');
        if($maxid==null)$maxid=1;
        else  $maxid +=1;   
        $Condition->id=$maxid;
        $Condition->name=Input::get('name');     
        $result=$Condition->save();

       
        if ( $result )
        {          
             return Redirect::to('/car-conditionlist');
        }
        else
        {
            // Get validation errors (see Ardent package)
            $error = $Condition->errors()->all();

            return View::make('condition.list');
        }
    }

    /**
    *   To get edit banner page
    */
    public function getEditCondition($id)
    {
                
        return View::make('condition.edit', array('condition' => Condition::find($id)));
    }

    /**************
    *   To Update data of banner info;
    */
    
    public function postEditCondition($id)
    {


        $condition=new Condition();

       
       $affectedRows = Condition::where('id', '=', $id)->update(array(
                    'name'=>Input::get('name') ? Input::get('name') : "",                     
                                                       
                    ));
       
         
        return Redirect::to('car-conditionlist');
    }

 
    public function getDeleteCondition($id)
    {           
            
            $affectedRows1 = Condition::where('id', '=', $id)->delete();
            
             return Redirect::to('/car-conditionlist');
            
    }

    public function postdelcondition()
    {           
           $todeleterecorts=Input::get('recordstoDelete');
           if(count($todeleterecorts) == 0)
          {
            return Redirect::to("/car-conditionlist");
          }
           
            foreach ($todeleterecorts as $recid) 
            {
                
                $result = Condition::where('id', '=', $recid)->delete();
                
            }
            return Redirect::to("/car-conditionlist");
    }

     public function getAllCondition()
    {
       $conditions= Condition::orderBy('id', 'DESC')                
                ->paginate(15);
        $count=count(Condition::all());
        return \View::make('condition.list')->with('conditions', $conditions)->with('count',$count);
    }

    
    public function postSearchCondition()
    {
            $keyword =Input::get('keyword');            
            $conditions = Condition::where('name','LIKE','%' . $keyword . '%')
                        ->orderBy('id', 'DESC')->paginate(10);
           $count=count($conditions);
            return \View::make('condition.list')->with('conditions', $conditions)->with('count',$count);
    
        
    }
    

}