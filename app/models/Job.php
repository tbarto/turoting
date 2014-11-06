<?php

class Job extends \Eloquent {
	protected $fillable = ['name','categorie_id'];
	protected $table = 'jobs';
}