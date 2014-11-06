<?php

class Review extends \Eloquent {
	protected $fillable = ['content','score'];
	protected $table = 'reviews';
}