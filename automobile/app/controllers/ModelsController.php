<?php

class ModelsController extends BaseController
{

    public function getAddModels()
    {       
      $objmakes=Make::all();
      return View::make('models.add', array('makes' => $objmakes));
    }

    public function getModelsByMake($make){
      $models=Models::wheremakeid($make)->get();
      return Response::json($models);
    }
	
   
    public function postAddModels()
    {      
        $Models=new Models();
        $Models->makeid=Input::get('make');  
        $Models->model=Input::get('model');
        $result=$Models->save();
        return Redirect::to('car-modellist');
    }

   
    public function getEditModels($id)
    {
      $objmakes=Make::all();    
      $objmodel=Models::find($id);    
      return View::make('models.edit', array('makes' => $objmakes, 'model' => $objmodel));
    }

    
    
    public function postEditModels($id)
    {
      $Models=new Models();
      $affectedRows = Models::where('id', '=', $id)->update(array(
                    'makeid'=>Input::get('make'),                     
                    'model'=>Input::get('model') ? Input::get('model') : "",                     
                    ));
       
         
        return Redirect::to('car-modellist');
    }

 
    public function getDeleteModels($id)
    {           
            
            $affectedRows1 = Models::where('id', '=', $id)->delete();
            
             return Redirect::to('/car-modellist');
            
    }

    public function postdelModels()
    {           
           $todeleterecorts=Input::get('recordstoDelete');
           if(count($todeleterecorts) == 0)
          {
            return Redirect::to("/car-modellist");
          }
           
            foreach ($todeleterecorts as $recid) 
            {
                
                $result = Models::where('id', '=', $recid)->delete();
                
            }
            return Redirect::to("/car-modellist");
    }

    public function getAllModels()
      { 
         $objmodels= Models::orderBy('makeid', 'DESC')                
                  ->paginate(12);
          $i=0;
          foreach ($objmodels as $row) {
            $objmodels[$i]=$row;
            $objmodels[$i]['make']=Make::whereid($row->makeid)->pluck('make');
            $i++;
          }
          $count=count(Models::all());
          return \View::make('models.list', array('models' => $objmodels, 'count' => $count));
      }

    
    public function postSearchModels()
    {
            $keyword =Input::get('keyword');            
            $objmodels = Models::where('model','LIKE','%' . $keyword . '%')
                        ->orderBy('id', 'DESC')->paginate(10);
            $i=0;
            $count=count($objmodels);
            if($count>0){
              foreach ($objmodels as $row) {
                $objmodels[$i]=$row;
                $objmodels[$i]['make']=Make::whereid($row->makeid)->pluck('make');
                $i++;
              }
            }
            return \View::make('models.list')->with('models', $objmodels)->with('count',$count);
    
        
    }
    

}