<?php

class Post extends \Eloquent {
	protected $fillable = ['content','user_id','job_id','post_type'];
	protected $table = 'posts';

	public function jobs(){
		return $this->belongsTo('Job','job_id');
	}
	public function users(){
		return $this->belongsTo('User','user_id');
	}
}