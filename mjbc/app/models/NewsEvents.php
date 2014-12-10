<?php  
class NewsEvents extends Eloquent{ 
    protected $table = 'news_events';
    public $timestamps=false;

    public function news_event_images(){
    	return $this->hasMany('NewsImages','news_event_id');
    }
}