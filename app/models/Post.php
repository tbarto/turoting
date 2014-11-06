<?php

class Post extends \Eloquent {
	protected $fillable = ['content','user_id','job_id','post_type'];
	protected $table = 'posts';
}