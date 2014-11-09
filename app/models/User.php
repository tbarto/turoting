<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function profiles() {
	    return $this->hasOne('Profile','user_id');
	}
/*
	public function dongs(){
		return $this->belongsTo('Dong', 'dong_id');
	}
	public function gus(){
		return $this->belongsTo('Gu', 'gu_id');
	}
	public function cities(){
		return $this->belongsTo('Citie', 'citie_id');
	}
*/
	public function roles(){
		return $this->belongsToMany('Role');
	}
	public function jobs(){
		return $this->belongsToMany('Job');
	}
	public function posts(){
		return $this->hasMany('Posts');
	}
	public function sent_messages(){
		return $this->hasMany('Message','from_id');
	}
	public function received_messages(){
		return $this->hasMany('Message','user_id');
	}
}
