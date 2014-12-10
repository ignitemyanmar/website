<?php

class ArticleCategoryController extends BaseController {

	public function getAddArticleCategory()
	{   
	    return View::make('articlecategory.add');
	}
	public function postAddArticleCategory()
  	{   
      $objcategory=new ArticleCategory();
      $objcategory->category= Input::get('category');
      $objcategory->save();
      return Redirect::to('/car-article-categorylist');
  	}

  public function getEditArticleCategory($id)

  {
        return \View::make('articlecategory.edit')->with('category',ArticleCategory::find($id));
    }

  public function postEditArticleCategory($id)
    {
        $objcategory=ArticleCategory::find($id);
        $objcategory->category=Input::get('category');
        $objcategory->save();
        return Redirect::to('/car-article-categorylist');      
    }

     public function getDeleteArticleCategory($id)
    {       
            $affectedRows1 = ArticleCategory::where('id', '=', $id)-> delete();
            return Redirect::to('car-article-categorylist');
    }

  public function postdelArticleCategory()
    {           
           $todeleterecorts=Input::get('recordstoDelete');
           if(count($todeleterecorts) == 0)
           {
            return Redirect::to("/car-article-categorylist");
           }
           
            foreach ($todeleterecorts as $recid) 
            {
                $result = ArticleCategory::where('id', '=', $recid)->delete();
            }
            return Redirect::to("/car-article-categorylist");
    }

  public function showArticleCategorylist()
  {
    $objcategories=ArticleCategory::paginate(12);
    $response=$objcategories;
    $totalcount=ArticleCategory::count();
    // return Response::json($objitems);
    return View::make('articlecategory.list', array('categories'=>$response, 'count'=>$totalcount));
  }


  public function postSearchArticleCategory()
  {
    $keyword =Input::get('keyword');
    $response=$objArticleCategory=ArticleCategory::where('category','LIKE','%' . $keyword . '%')
                ->orderBy('id', 'DESC')
                ->paginate(1);
    $totalcount=ArticleCategory::count();

    return View::make('articlecategory.list', array('categories'=>$response, 'count'=>$totalcount));
    }
      


}