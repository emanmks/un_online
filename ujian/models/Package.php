<?php

class Package extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

	public function subject()
	{
		return $this->belongsTo('Subject');
	}

	public function questions()
	{
		return $this->hasMany('Question');
	}

}