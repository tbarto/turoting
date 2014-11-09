<?php

class Role extends \Eloquent {
	protected $fillable = ['name'];
	protected $table = 'roles';

	public function users(){
		return $this->belongsToMany('User');
	}
}