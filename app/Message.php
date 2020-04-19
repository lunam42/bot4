<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	protected $fillable = ['sender', 'txt', 'chat'];
	public $sender;
	public $txt;
	public $chat;

	public function Command()
	// detect what command was given
	{
		switch ($this->txt) 
		{
			case 'value':
				# code...
				break;
			
			default:
				# code...
				break;
		}
	}
}
