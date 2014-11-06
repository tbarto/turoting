<?php

class Gu extends \Eloquent {
	protected $fillable = ['name','lat','lng','citie_id'];
	protected $table = 'gus';
}