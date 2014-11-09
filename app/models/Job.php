<?php

class Job extends \Eloquent {
	protected $fillable = ['name','categorie_id'];
	protected $table = 'jobs';

	public function categories(){
		return $this->belongsTo('Categorie','categorie_id');
	}
	public function posts(){
		return $this->hasMany('Post');
	}
	public function users(){
		return $this->belongsToMany('User','user_id');
	}
}