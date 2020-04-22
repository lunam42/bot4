<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class AnswerDiv extends Answer
{
	private int $y;
	private int $x;

  public function makeUrl()
  {
  	//Http::get(Answer::API_URL.'&chat_id='.$this->getChatId().'&text='.$this->makeDiv());
  	return Answer::API_URL.'&chat_id='.$this->getChatId().'&text='.$this->makeDiv();
  }

  public function __construct(int $x, int $y)
  {
  	$this->x = $x;
  	$this->y = $y;
  }

  private function makediv(): float
  {
  	return $this->x/$this->y;
  }
}
