<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Answer;
use App\Models\AnswerSimple;
use App\Models\AnswerStart;
use App\Models\AnswerLast;
use App\Models\AnswerDiv;

class Message extends Model
{
	protected $fillable = ['sender', 'txt', 'chat'];
	public $Sender;
	public $Txt;
	public $Chat;

	public function whoSend(): string
	// return sender's nick 
	{
		return $this->belongsTo('App\Models\Client', 'sender', 'tlg_id')->get('nick')->toArray()[0]['nick'];
	}

	public function whatCommand()
	// detect what command was given
	{
		switch ($this->Txt) 
		{
			case '/start':
				$Answ = new AnswerStart;
				$Answ->setChatId($this->Sender);
				$Answ->setAlert('lol');
				$Answ->makeUrl();
/*Illuminate\Http\Client\ConnectionException: cURL error 35: Unknown SSL protocol error in connection to api.telegram.org:443  (see https://curl.haxx.se/libcurl/c/libcurl-errors.html) in file /home/u4772/domains/u4772.dark.elastictech.org/vendor/laravel/framework/src/Illuminate/Http/Client/PendingRequest.php on line 483*/
			break;
			case '\xF0\x9F\x98\x85 привет':
				$Answ = new AnswerSimple;
				$Answ->setChatId($this->Sender);
				$Answ->setAlert('Привет'.$this->whoSend().', рад тебя видеть, последний раз ты писал мне'.Client::find($this->Sender)->whenLastMessage());
				$Answ->makeUrl();
			break;
			case '\xF0\x9F\x98\x8B пока':
				$Answ = new AnswerSimple;
				$Answ->setChatId($this->Sender);
				$Answ->setAlert('Пока'.$this->whoSend().'будем ждать вас снова,  Вы уже написали'.Client::find($this->Sender)->countMessages().'сообщений');
				$Answ->makeUrl();
			break;
			default:
				if (substr($this->Txt, 0, 4) == '/last')
				{
					$n = $this->Txt{6};
					$Answ = new AnswerLast($n);
					$Answ->setChatId($this->Sender);
					$Answ->makeUrl();
				}
				else if (substr($this->Txt, 0, 3) == '/div')
				{
					$Answ = new AnswerDiv($this->Txt{5}, $this->Txt{7});
					$Answ->setChatId($this->Sender);
					$Answ->makeUrl();
				}
				else
				{
					$Answ = new AnswerSimple;
					$Answ->setChatId($this->Sender);
					$Answ->setAlert('чел, пиши внятно');
					$Answ->makeUrl();	
				}
			break;
		}
	}
}
