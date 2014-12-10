<?php  
class Consultancy extends Eloquent{ 
    protected $table = 'consultancy';
    public $timestamps=false;

    public function images(){
        return $this->hasMany('ConsultancyImages','consultancy_id');
    }

    public function consultancy_images(){
        return $this->hasMany('ConsultancyImages','consultancy_id');
    }
    
}