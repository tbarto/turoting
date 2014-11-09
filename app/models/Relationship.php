<?php

class Relationship extends \Eloquent {
	protected $fillable = ['user_id','user_id1','job_id','review_id'];
	protected $table = 'relationships';

	public function reviews(){
		return $this->belongsTo('Review','review_id');
	}
}