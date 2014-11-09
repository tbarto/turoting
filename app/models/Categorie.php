<?php

class Categorie extends \Eloquent {
	protected $fillable = ['name'];
	protected $table = 'categories';

	public function jobs(){
		return $this->hasMany('Job');
	}
}