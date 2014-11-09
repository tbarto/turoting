<?php

class Message extends \Eloquent {
	protected $fillable = ['from_id','from_username','content','read','user_id'];
	protected $table = 'messages';

	public function sender(){
		return $this->belongsTo('User','from_id');
	}
	public function receiver(){
		return $this->belongsTo('User','user_id');
	}
}