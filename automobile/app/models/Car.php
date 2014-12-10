<?php
class Car extends Eloquent
{ 
	protected $table = 'car';
	// public $timestamps = false;

	public function model(){
		return $this->belongsTo('Models', 'modelid');
	}
	public function make(){
		return $this->belongsTo('Make', 'makeid');
	}
	public function body(){
		return $this->belongsTo('Body', 'bodyid');
	}

	public function color(){
		return $this->hasOne('Color', 'id', 'colorid');
	}

	public function enginepowers(){
		return $this->hasOne('EnginePower', 'id', 'enginepower_id');
	}

	public function city(){
		return $this->belongsTo('City', 'cityid');
	}

	public function condition(){
		return $this->belongsTo('Condition', 'conditionid');
	}

	public function images(){
		return $this->hasMany('CarImages', 'carid');
	}

	public function ingredients(){
		return $this->hasMany('CarIngredient', 'carid');
	}

	public function user(){
		return $this->belongsTo('User','dealerid');
	}
	public function dealer(){
		return $this->hasOne('Dealer', 'userid', 'dealerid');
	}

}
