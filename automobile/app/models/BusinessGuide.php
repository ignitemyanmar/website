<?php
	Class BusinessGuide extends Eloquent 
	{ 
		protected $table = 'business_guide';
		public $timestamps = false;

		public function days()
		{
			return $this->hasMany('BusinessDays','businessid');
		}
	}
?>
