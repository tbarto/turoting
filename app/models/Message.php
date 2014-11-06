<?php

class Message extends \Eloquent {
	protected $fillable = ['from_id','from_username','content','read','user_id'];
	protected $table = 'messages';
}