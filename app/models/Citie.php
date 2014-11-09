<?php

class Citie extends \Eloquent {
	protected $fillable = ['name','lat','lng'];
	protected $table = 'cities';

	public function gus(){
		return $this->hasMany('Gu');
	}
	public function profiles(){
		return $this->hasMany('Profile');
	}
}