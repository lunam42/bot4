<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswerDiv extends Answer
{
	private $y;
	private $x;

  public function makeUrl
  {
  	//
  }

  public function __construct(int $x, int $y)
  {
  	$this->x = $x;
  	$this->y = $y;
  }

  private function makediv()
  {
  	return $this->x/$this->y;
  }
}
