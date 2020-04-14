<?php
	namespace App\Http\Controllers;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Http;
	use App\Client;
	use App\Message;
	use Illuminate\Support\Str;

	class TlgUpdateController extends Controller
	{
		public function tst(Request $request)
		{	
			$api_url = 'https://api.telegram.org/bot1192179475:AAFCUUNnifhdihCOCnmqNL4HRNbGrfU2His/sendMessage?';
			$message_id = $request->input('message.message_id');
			$message_txt = $request->input('message.text');
			$message_chat = $request->input('message.chat.id');
			$client_id = $request->input('message.from.id');
			$client_nick = $request->input('message.from.username');
			$client_lang = $request->input('message.from.language_code');

			$client = new Client();
			$client->client_id = $client_id;
			$client->client_nick = $client_nick;
			$client->client_lang = $client_lang;
			
			$message = new Message();
			$message->message_txt = $message_txt;
			$message->message_id = $message_id;
			$message->owner_id = $client_id;
			$message->message_chat = $message_chat;

			\App\Client::updateOrCreate(
				['client_id' => $client_id],
				['client_nick' => $client_nick, 'client_lang' => $client_lang] 
			);

			\App\Message::updateOrCreate(
				['message_id' => $message_id], 
				['owner_id' => $client_id, 'message_txt'=> $message_txt, 'message_chat' => $message_chat]
			);

			$command = preg_replace_array('/([0-9|#][\x{20E3}])|[\x{00ae}|\x{00a9}|\x{203C}|\x{2047}|\x{2048}|\x{2049}|\x{3030}|\x{303D}|\x{2139}|\x{2122}|\x{3297}|\x{3299}][\x{FE00}-\x{FEFF}]?|[\x{2190}-\x{21FF}][\x{FE00}-\x{FEFF}]?|[\x{2300}-\x{23FF}][\x{FE00}-\x{FEFF}]?|[\x{2460}-\x{24FF}][\x{FE00}-\x{FEFF}]?|[\x{25A0}-\x{25FF}][\x{FE00}-\x{FEFF}]?|[\x{2600}-\x{27BF}][\x{FE00}-\x{FEFF}]?|[\x{2900}-\x{297F}][\x{FE00}-\x{FEFF}]?|[\x{2B00}-\x{2BF0}][\x{FE00}-\x{FEFF}]?|[\x{1F000}-\x{1F6FF}][\x{FE00}-\x{FEFF}]?/u',[''],$message_txt);
			switch ($command) {
				case '/start':
					$answer = "?";
					$keyboard = array("keyboard" => array(array(array("text" => " \xF0\x9F\x98\x85 привет"),
																											array("text" => " \xF0\x9F\x98\x8B пока")
																											)
																								),
														"resize_keyboard" => true);
					$encoded_keyboard = json_encode($keyboard);
					$answer_url = $api_url.'chat_id='.$message_chat.'&text='.$answer.'&reply_markup='.$encoded_keyboard;
					break;
				case 'привет':
					$when = 
					$answer = 'привет'.$client_nick.'последний раз ты писал'.'';
					break;
				case ' \xF0\x9F\x98\x8B пока':
					echo('mentolol');
					break;
				default:
					echo('lolololo');
					break;
			}
		
			dd($answer_url);
			//$response = Http::get($answer_url);
			
		}
	}