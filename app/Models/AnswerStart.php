<?php

namespace App;

use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;

class AnswerStart extends Answer
{
	const KEYBOARD = array("keyboard" => array(array(array("text" => "\xF0\x9F\x98\x85 привет"),
																											array("text" => "\xF0\x9F\x98\x8B пока")
																											)
																								),
														"resize_keyboard" => true);
	
	public function makeUrl()
    {
    	$encoded_keyboard = json_encode(AnswerStart::KEYBOARD);
    	//Http::get(Answer::API_URL.'&chat_id='.$this->getChatId().'&text='.$this->getAlert().'&reply_markup='.$encoded_keyboard);
    	return Answer::API_URL.'&chat_id='.$this->getChatId().'&text='.$this->getAlert().'&reply_markup='.$encoded_keyboard;
		}
	}
