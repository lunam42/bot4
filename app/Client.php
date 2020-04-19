<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
	protected $fillable = ['tlg_id', 'nick', 'lang'];
	public $primaryKey = 'tlg_id';
	public $incrementing = false;
	public $tlg_id;
	public $nick;
	public $lang;

	public function countMessages()
	// считаем все сообщенния клиента
	{
		return $this->hasMany('App\Message', 'sender', 'tlg_id')->count();
	}

	public function whenLastMessage()
	// получаем дату последнего сообщения клиента
	{
		return $this->hasMany('App\Message', 'sender', 'tlg_id')->max('created_at');
	}

	public function lastN(int $n)
	// n последних сообщений
	{
		$res = '';
		$msgs = $this->hasMany('App\Message', 'sender', 'tlg_id')->orderBy('created_at', 'desc')->take($n)->get();
		foreach ($msgs as $msg)
		{
			$msg->toArray();
			$res = $res.' "'.$msg['txt'].'"';
		}
		return $res;
	}
}
