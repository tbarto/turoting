<?php

class Review extends \Eloquent {
	protected $fillable = ['content','score'];
	protected $table = 'reviews';

	public function relationships(){
		return $this->hasOne('Relationship');
	}
}