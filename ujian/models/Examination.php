<?php

class Examination extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

	public function package() 
	{
		return $this->belongsTo('Package');
	}

	public function answers()
	{
		return $this->hasMany('answer');
	}

}