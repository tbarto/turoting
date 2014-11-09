<?php

class Profile extends \Eloquent {
	protected $fillable = ['provider','user_id'];
	protected $table = 'profiles';

	public function user() {
        return $this->belongsTo('User','user_id');
    }
   	public function cities(){
		return $this->belongsTo('Citie','citie_id');
	}
	public function gus(){
		return $this->belongsTo('Gu','gu_id');
	}
	public function dongs(){
		return $this->belongsTo('Dong','dong_id');
	}
}