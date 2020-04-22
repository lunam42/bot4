<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class AnswerSimple extends Answer
{
	public function makeUrl()
  {
  	//Http::get(Answer::API_URL.'&chat_id='.$this->getChatId().'&text='.$this->getAlert());
  	return Answer::API_URL.'&chat_id='.$this->getChatId().'&text='.$this->getAlert()
  }
}
