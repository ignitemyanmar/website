<?php  
class SeminarType extends Eloquent{ 
    protected $table = 'seminar_type';
    public $timestamps=false;

    public function seminars()		
    {
    	return $this->hasMany('Seminar', 'seminar_type_id')->select(['seminar_type_id','id','language_id', 'name']);
    }
}