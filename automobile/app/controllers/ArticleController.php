<?php

class ArticleController extends BaseController {

	public function getallarticle()
	{
    $article=CarArticle::paginate(12);
    if(count($article)>0){
      $i=0;
      foreach ($article as $row) {
        $article[$i]=$row;
        $article[$i]['category']=ArticleCategory::whereid($row->categoryid)->pluck('category');
      }
    }
		return View::make('article.index', array('article'=>$article));
	}

	public function getarticlebytype($type)
	{
    $types=substr($type, 0,5);
    switch ($types) {
      case 'japan':
        $types='ဂ်ပန္';
        $typeeng='japan';
        break;
      case 'ameri':
        $types='အေမရိကန္';
        $typeeng='american';
        break;
      case 'germa':
        $types='ဂ်ာမနီ';
        $typeeng='germany';
        break;
      case 'engla':
        $types='အဂၤလန္';
        $typeeng='england';
        break;
      default:
        $types='အျခား';
        $typeeng='other';
        break;
    }
    if($typeeng !='other'){
      $categoryid=ArticleCategory::where('category', 'like', '%'.$types.'%')->orwhere('category', 'like', '%'.$typeeng.'%')->pluck('id');
      $article=CarArticle::wherecategoryid($categoryid)->paginate(12); 
    }else{
      // dd($typeeng);
      $types='အျခား';
      $american='အေမရိကန္';
      $germany='ဂ်ာမနီ';
      $england='အဂၤလန္';
      $japan='ဂ်ပန္';
      $americaneng='american';
      $germanyeng='germany';
      $englandeng='england';
      $japaneng='japan';      
      $categoryid=ArticleCategory::where('category', 'Not Like','%'. $american.'%')
                                  ->where('category', 'Not Like','%'. $americaneng.'%')
                                  ->where('category', 'Not Like','%'. $japan.'%')
                                  ->where('category', 'Not Like','%'. $japaneng.'%')
                                  ->where('category', 'Not Like','%'. $germany.'%')
                                  ->where('category', 'Not Like','%'. $germanyeng.'%')
                                  ->where('category', 'Not Like','%'. $england.'%')
                                  ->where('category', 'Not Like','%'. $englandeng.'%')
                                    ->lists('id');
      // return Response::json($categoryid);
      $article=CarArticle::wherein('categoryid',$categoryid)->paginate(12); 
    }
    
    if(count($article)>0){
      $i=0;
      foreach ($article as $row) {
        $article[$i]=$row;
        $article[$i]['category']=ArticleCategory::whereid($row->categoryid)->pluck('category');
        $i++;
      }
    }
    return View::make('article.type', array('type' => $type, 'article'=> $article));
	}

  public function getarticledetail($type,$title){
    $title=str_replace('-', ' ', $title);
    $article=CarArticle::wheretitle($title)->first();
    return View::make('article.detail', array('type' => $type, 'article'=> $article));
  }

	public function getAddArticle()
	{   
      $objcategory=ArticleCategory::all();
      return View::make('article.add', array('categories' => $objcategory));
	}
	public function postAddArticle()
  	{   
      $title=Input::get('title');
      $category=Input::get('category');
      $status=Input::get('status');
      $file=Input::file( 'image_file' );
      $short_description=Input::get('short_description');
      $description=Input::get('description');
      $articleimage='';
      if($file!=null){
        $filename='';
        $OriginalFilename= $file->getClientOriginalName();
            $articleimage=$OriginalFilename ;
            // rename file if it already exists by prefixing an incrementing number
            $FileCounter = 1;
            $filename = pathinfo($OriginalFilename, PATHINFO_FILENAME);
            $extension =  pathinfo($OriginalFilename, PATHINFO_EXTENSION);
            while (file_exists( 'articlephoto/php/files/'.$articleimage )){
              $tempname= $filename . '_' . $FileCounter++ ;
              $articleimage = $tempname . '.' . $extension;
           }

          $destinationPath = 'articlephoto/php/files/';
          Input::file('image_file')->move($destinationPath, $articleimage);
      }     
      $objarticle=new CarArticle();
      $objarticle->title=$title; 
      $objarticle->categoryid=$category; 
      $objarticle->status=$status; 
      $objarticle->image=$articleimage; 
      $objarticle->short_description=$short_description; 
      $objarticle->description=$description; 
      $objarticle->save();
      return Redirect::to('/car-articlelist');
  	}

  public function getEditArticle($id)

  { 
    $objcategory=ArticleCategory::all();
    $objarticle=CarArticle::find($id);

        return \View::make('article.edit', array('categories' => $objcategory, 'article' => $objarticle));
    }

  public function postEditArticle($id)
    {
       
      $title=Input::get('title');
      $category=Input::get('category');
      $status=Input::get('status');
      $file=Input::file( 'image_file' );
      $short_description=Input::get('short_description');
      $description=Input::get('description');
      $articleimage='';
      if($file!=null){
        $image=CarArticle::whereid($id)->pluck('image');
        @unlink("articlephoto/php/files/".$image);
        $filename='';
        $OriginalFilename= $file->getClientOriginalName();
            $articleimage=$OriginalFilename ;
            // rename file if it already exists by prefixing an incrementing number
            $FileCounter = 1;
            $filename = pathinfo($OriginalFilename, PATHINFO_FILENAME);
            $extension =  pathinfo($OriginalFilename, PATHINFO_EXTENSION);
            while (file_exists( 'articlephoto/php/files/'.$articleimage )){
              $tempname= $filename . '_' . $FileCounter++ ;
              $articleimage = $tempname . '.' . $extension;
           }

          $destinationPath = 'articlephoto/php/files/';
          Input::file('image_file')->move($destinationPath, $articleimage);
      }else{
            $articleimage=Input::get('hdphoto');
      }     
      $objarticle=CarArticle::find($id);
      $objarticle->title=$title; 
      $objarticle->categoryid=$category; 
      $objarticle->status=$status; 
      $objarticle->image=$articleimage; 
      $objarticle->short_description=$short_description; 
      $objarticle->description=$description; 
      $objarticle->save();
      return Redirect::to('/car-articlelist');
    }

     public function getDeleteArticle($id)
    {       
            $image=CarArticle::whereid($id)->pluck('image');  
            @unlink('articlephoto/php/files/'.$image);  


            $affectedRows1 = CarArticle::where('id', '=', $id)-> delete();
            return Redirect::to('car-articlelist')->with('message','One Record have been deleted.');
    }

  public function postdelArticle()
    {           
           $todeleterecorts=Input::get('recordstoDelete');
           if(count($todeleterecorts) == 0)
           {
            return Redirect::to("/articlelist");
           }
           
            foreach ($todeleterecorts as $recid) 
            {
                $image=CarArticle::whereid($recid)->pluck('image');  
                @unlink('articlephoto/php/files/'.$image);  
                $result = CarArticle::where('id', '=', $recid)->delete();
            }
            return Redirect::to("/articlelist");
    }

  public function showArticlelist()
  {
    $objCarArticle=CarArticle::orderBy('id','desc')->paginate(12);
    $i=0;
    foreach ($objCarArticle as $rows) {
      $objCarArticle[$i]=$rows;
      $objCarArticle[$i]['category']=ArticleCategory::whereid($rows->categoryid)->pluck('category');
      $i++;
    }
    $response=$objCarArticle;
    $totalcount=CarArticle::count();
    return View::make('article.list', array('response'=>$response, 'totalcount'=>$totalcount));
  }


  public function postSearchArticle()
  {
    $keyword =Input::get('keyword');
    $objCarArticle=CarArticle::where('title','LIKE','%' . $keyword . '%')
                ->orwhere('description','LIKE','%' . $keyword . '%')
                ->orderBy('id', 'DESC')
                ->paginate(12);
        $i=0;
        foreach ($objCarArticle as $rows) {
          $objCarArticle[$i]=$rows;
          $objCarArticle[$i]['category']=ArticleCategory::whereid($rows->categoryid)->pluck('category');
          $i++;
        }

        $response=$objCarArticle;
        $totalcount=CarArticle::count();
        return View::make('article.list', array('response'=>$response, 'totalcount'=>$totalcount));
        }
      


}