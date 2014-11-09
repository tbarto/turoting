<?php

class Dong extends \Eloquent {
	protected $fillable = ['name','lat','lng','gu_id'];
	protected $table = 'dongs';

	public function gus(){
		return $this->belongsTo('Gu','gu_id');
	}
	public function profiles(){
		return $this->hasMany('Profile');
	}
}