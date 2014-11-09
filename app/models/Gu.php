<?php

class Gu extends \Eloquent {
	protected $fillable = ['name','lat','lng','citie_id'];
	protected $table = 'gus';

	public function cities(){
		return $this->belongsTo('Citie','citie_id');
	}
	public function dongs(){
		return $this->hasMany('Dong');
	}
	public function profiles(){
		return $this->hasMany('Profile');
	}
}