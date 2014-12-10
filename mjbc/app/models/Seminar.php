<?php  
class Seminar extends Eloquent{ 
    protected $table = 'seminars';
    public $timestamps=false;

    public function images(){
        return $this->hasMany('SeminarImages','seminar_id');
    }

    public function seminar_images(){
        return $this->hasMany('SeminarImages','seminar_id');
    }

    public function time_table(){
    	return $this->hasMany('TimeTable', 'seminar_id');
    }

    public function seminartype(){
        return $this->belongsTo('SeminarType', 'seminar_type_id');
    }

    
}