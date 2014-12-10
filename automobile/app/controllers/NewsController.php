<?php

class NewsController extends BaseController {

	public function getIndex()
	{
        $news=News::orderBy('id','desc')->paginate(8);
		return View::make('news.index', array('news'=> $news));
	}

	public function getnewsbytype($type)
	{
        $news=News::wheretype($type)->orderBy('id','desc')->paginate(8);
		return View::make('news.type', array('type' => $type, 'news'=> $news));
	}

    public function getnewsdetail($type, $title)
    {
        $title=str_replace('-', ' ', $title);
        $news=News::wherename($title)->wheretype($type)->first();
        return View::make('news.detail', array('type' => $type, 'news'=> $news));
    }

	public function getAddNews()
    {                       
        return View::make('news.add');
    }
	
    /**
     * Stores new Banner
     *
     */
    public function postAddNews()
    {       
        $news=new News();
        $news->name=Input::get('title');     
        $news->image=Input::get('gallery1');     
        $news->type=Input::get('type');     
        $news->short_description=Input::get('short_description');     
        $news->description=Input::get('description');     
        $result=$news->save();

	    return Redirect::to('/newslist');
        
    }

    /**
    *   To get edit banner page
    */
    public function getEditNews($id)
    {
        return \View::make('news.edit')->with('news',News::find($id));
    }

    /**************
    *   To Update data of banner info;
    */
    
    public function postEditNews($id)
    {
        $news=News::find($id);
        $image=Input::get('gallery1');
        $oldfile=Input::get('hdimage');
        $news->image=$image ? $image : $oldfile;
        $news->name=Input::get('title');     
        $news->type=Input::get('type');     
        $news->short_description=Input::get('short_description');     
        $news->description=Input::get('description'); 
        if($image !=''){
          @unlink('newsphoto/php/files/'.$oldfile);
          @unlink('newsphoto/php/files/thumbnail/'.$oldfile);
        }    
        $result=$news->update();

	    return Redirect::to('/newslist');
    }

 
    public function getDeleteNews($id)
    {           
            
            $affectedRows1 = News::where('id', '=', $id)->delete();
            return Redirect::to('/newslist');
            
    }

    public function postdelNews()
    {           
           $todeleterecorts=Input::get('recordstoDelete');
           if(count($todeleterecorts) == 0)
          {
            return Redirect::to("/newslist");
          }
           
            foreach ($todeleterecorts as $recid) 
            {
                
                $result = News::where('id', '=', $recid)->delete();
                
            }
            return Redirect::to("/newslist");
    }

     public function getAllNews()
    {
       $news= News::orderBy('id', 'DESC')                
                ->paginate(15);
        $count=count(News::all());
        return \View::make('news.list')->with('news', $news)->with('count',$count);
    }

    
    public function postSearchNews()
    {
            $keyword =Input::get('keyword');            
            $news = News::where('name','LIKE','%' . $keyword . '%')
                        ->orwhere('type','LIKE','%' . $keyword . '%')
                        ->orderBy('id', 'DESC')->paginate(10);
           $count=count($news);
            return View::make('news.list')->with('news', $news)->with('count',$count);
    
        
    }
    


}