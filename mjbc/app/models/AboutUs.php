<?php  
class AboutUs extends Eloquent{ 
    protected $table = 'about_us';
    public $timestamps=false;

    public function about_us_images(){
        return $this->hasMany('AboutUsImg','about_us_id');
    }
}