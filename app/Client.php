<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	protected $fillable = ['tlg_id', 'nick', 'lang'];
	public $primaryKey = 'tlg_id';
	public $incrementing = false;
	public $Tlg_id;
	public $Nick;
	public $Lang;

	public function countMessages(): int
	// get count of all client's messages
	{
		return $this->hasMany('App\Models\Message', 'sender', 'tlg_id')->count();
	}

	public function whenLastMessage(): string
	// get last date of message from this client
	{
		return $this->hasMany('App\Models\Message', 'sender', 'tlg_id')->max('created_at');
	}

	public function lastN(int $n): int 
	// get last n texts of messages
	{
		$res = '';
		$msgs = $this->hasMany('App\Models\Message', 'sender', 'tlg_id')->orderBy('created_at', 'desc')->take($n)->get();
		foreach ($msgs as $msg)
		{
			$msg->toArray();
			$res = $res.' "'.$msg['txt'].'"';
		}
		return $res;
	}
}
