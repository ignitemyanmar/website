<?php  
class ExecutiveSearch extends Eloquent{ 
    protected $table = 'executive_search';
    public $timestamps=false;

    public function images(){
        return $this->hasMany('NewsImages','news_event_id');
    }

    public function news_event_images(){
        return $this->hasMany('NewsImages','news_event_id');
    }
    
}