<?php

namespace App;

use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;

class AnswerLast extends Answer
{
	private int $n;

	public function __construct(int $n)
	{
		$this->n = $n;
	}

  public function makeUrl()
  {
  	//Http::get(Answer::API_URL.'&chat_id='.$this->getChatId().'&text='.Client::find($this->getChatId())->lastN($this->n);
  	return Answer::API_URL.'&chat_id='.$this->getChatId().'&text='.Client::find($this->getChatId())->lastN($this->n); 
  }
}
