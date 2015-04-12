<?php

class Question extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

	public function picture()
	{
		return $this->belongsTo('Picture');
	}

	public function literature()
	{
		return $this->belongsTo('Literature');
	}

	public function listening()
	{
		return $this->belongsTo('Listening');
	}

}