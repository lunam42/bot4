<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswerLast extends Answer
{
	private $n;

	public function __construct(int $n)
	{
		$this->n = $n;
	}

  public function makeUrl
  {
  	//
  }
}
