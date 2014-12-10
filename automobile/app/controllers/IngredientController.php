<?php

class IngredientController extends BaseController
{

	
    public function getAddIngredient()
    {                       
        return View::make('ingredient.add');
    }
	
  
    public function postAddIngredient()
    {       
        $Ingredient=new Ingredient();
        $maxid=Ingredient::max('id');
        if($maxid==null)$maxid=1;
        else  $maxid +=1;   
        $Ingredient->id=$maxid;
        $Ingredient->name=Input::get('name');     
        $result=$Ingredient->save();
        return Redirect::to('/car-ingredientlist');
    }

   
    public function getEditIngredient($id)
    {
                
        return \View::make('ingredient.edit')->with('ingredient',Ingredient::find($id));
    }

    
    public function postEditIngredient($id)
    {


        $ingredient=new Ingredient();

       
       $affectedRows = Ingredient::where('id', '=', $id)->update(array(
                    'name'=>Input::get('name') ? Input::get('name') : "",                     
                                                       
                    ));
       
         
        return Redirect::to('car-ingredientlist');
    }

 
    public function getDeleteIngredient($id)
    {           
            
            $affectedRows1 = Ingredient::where('id', '=', $id)->delete();
            
             return Redirect::to('/car-ingredientlist');
            
    }

    public function postdelIngredient()
    {           
           $todeleterecorts=Input::get('recordstoDelete');
           if(count($todeleterecorts) == 0)
          {
            return Redirect::to("/car-ingredientlist");
          }
           
            foreach ($todeleterecorts as $recid) 
            {
                
                $result = Ingredient::where('id', '=', $recid)->delete();
                
            }
            return Redirect::to("/car-ingredientlist");
    }

     public function getAllIngredient()
    {
       $ingredients= Ingredient::orderBy('id', 'DESC')                
                ->paginate(15);
        $count=count(Ingredient::all());
        return \View::make('ingredient.list')->with('ingredients', $ingredients)->with('count',$count);
    }

    
    public function postSearchIngredient()
    {
            $keyword =Input::get('keyword');            
            $ingredients = Ingredient::where('name','LIKE','%' . $keyword . '%')
                        ->orderBy('id', 'DESC')->paginate(10);
           $count=count($ingredients);
            return \View::make('ingredient.list')->with('ingredients', $ingredients)->with('count',$count);
    
        
    }
    

}