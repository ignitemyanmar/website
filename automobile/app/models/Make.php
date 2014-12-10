<?php
	Class Make extends Eloquent 
	{ 
		protected $table = 'make';
		public $timestamps = false;

		public function typebymake()
		{
			return $this->hasMany('type_by_make','makeid');
		}
	}
?>
