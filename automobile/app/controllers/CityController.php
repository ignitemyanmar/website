<?php

class CityController extends BaseController
{

	
    public function getAddCity()
    {                       
        return View::make('city.add');
    }
	
  
    public function postAddCity()
    {       
        $City=new City();
        $maxid=City::max('id');
        if($maxid==null)$maxid=1;
        else  $maxid +=1;   
        $City->id=$maxid;
        $City->name=Input::get('name');     
        $result=$City->save();

       
        if ( $result )
        {          
             return Redirect::to('/car-citylist');
        }
        else
        {
          
            $error = $City->errors()->all();

            return View::make('city.list');
        }
    }

   
    public function getEditCity($id)
    {
                
        return \View::make('city.edit')->with('city',City::find($id));
    }

    
    public function postEditCity($id)
    {


        $city=new City();

       
       $affectedRows = City::where('id', '=', $id)->update(array(
                    'name'=>Input::get('name') ? Input::get('name') : "",                     
                                                       
                    ));
       
         
        return Redirect::to('car-citylist');
    }

 
    public function getDeleteCity($id)
    {           
            
            $affectedRows1 = City::where('id', '=', $id)->delete();
            
             return Redirect::to('/car-citylist');
            
    }

    public function postdelCity()
    {           
           $todeleterecorts=Input::get('recordstoDelete');
           if(count($todeleterecorts) == 0)
          {
            return Redirect::to("/car-citylist");
          }
           
            foreach ($todeleterecorts as $recid) 
            {
                
                $result = City::where('id', '=', $recid)->delete();
                
            }
            return Redirect::to("/car-citylist");
    }

     public function getAllCity()
    {
       $cities= City::orderBy('id', 'DESC')                
                ->paginate(15);
        $count=count(City::all());
        return \View::make('city.list')->with('cities', $cities)->with('count',$count);
    }

    
    public function postSearchCity()
    {
            $keyword =Input::get('keyword');            
            $cities = City::where('name','LIKE','%' . $keyword . '%')
                        ->orderBy('id', 'DESC')->paginate(10);
           $count=count($cities);
            return \View::make('city.list')->with('cities', $cities)->with('count',$count);
    
        
    }
    

}