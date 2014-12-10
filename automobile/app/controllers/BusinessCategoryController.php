<?php

class BusinessCategoryController extends BaseController
{

	
    public function getAddBusinessCategory()
    {                       
        return View::make('businesscategory.add');
    }
	
  
    public function postAddBusinessCategory()
    {       
        $objbusinesscategory=new BusinessCategory();
        $objbusinesscategory->title=Input::get('category');     
        $result=$objbusinesscategory->save();
        return Redirect::to('business-categorylist');
    }

    public function getEditBusinessCategory($id)
    {
        return View::make('businesscategory.edit')->with('businesscategory',BusinessCategory::find($id));
    }

    
    public function postEditBusinessCategory($id)
    {
        $objbusinesscategory=new BusinessCategory();
        $affectedRows = BusinessCategory::where('id', '=', $id)->update(array(
                    'title'=>Input::get('category')                    
                    ));
        return Redirect::to('business-categorylist');
    }

 
    public function getDeleteBusinessCategory($id)
    {           
            
            $affectedRows1 = BusinessCategory::where('id', '=', $id)->delete();
            
             return Redirect::to('/business-categorylist');
            
    }

    public function postdelBusinessCategories()
    {           
           $todeleterecorts=Input::get('recordstoDelete');
           if(count($todeleterecorts) == 0)
          {
            return Redirect::to("/business-categorylist");
          }
           
            foreach ($todeleterecorts as $recid) 
            {
                
                $result = BusinessCategory::where('id', '=', $recid)->delete();
                
            }
            return Redirect::to("/business-categorylist");
    }

     public function getAllBusinessCategory()
    {
       $objbusinesscategories= BusinessCategory::orderBy('id', 'DESC')                
                ->paginate(15);
        $count=count(BusinessCategory::all());
        return \View::make('businesscategory.list')->with('businesscategories', $objbusinesscategories)->with('count',$count);
    }

    
    public function postSearchBusinessCategory()
    {
            $keyword =Input::get('keyword');            
            $objbusinesscategories = BusinessCategory::where('title','LIKE','%' . $keyword . '%')
                        ->orderBy('id', 'DESC')->paginate(10);
           $count=count($objbusinesscategories);
            return \View::make('businesscategory.list')->with('businesscategories', $objbusinesscategories)->with('count',$count);
    
        
    }
    

}