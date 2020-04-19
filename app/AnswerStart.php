<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswerStart extends Answer
{
	private $keyboard = array("keyboard" => array(array(array("text" => " \xF0\x9F\x98\x85 привет"),
																											array("text" => " \xF0\x9F\x98\x8B пока")
																											)
																								),
														"resize_keyboard" => true);
	$encoded_keyboard = json_encode($keyboard);
	
	public function makeUrl(array $params)
    {
    	//;
    }
}
