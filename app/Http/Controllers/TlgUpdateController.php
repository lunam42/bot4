<?php
	namespace App\Http\Controllers;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use App\Client;
	use App\Message;
	
	class TlgUpdateController extends Controller
	{
		public function all(Request $request)
		{	
			$client = $this->storeClient($request);
			$message = $this->storeMessage($request);
			
			

		}

		private function storeClient(Request $request)
		// update/create new record in db and new instance of Client, fill its properties with data from request 
		{
			$client = \App\Client::updateOrCreate(
		    ['tlg_id' => $request->input('message.from.id')],
		    ['nick' => $request->input('message.from.username'), 'lang' => $request->input('message.from.language_code')]
			);
			$client->tlg_id = $request->input('message.from.id');
			$client->nick = $request->input('message.from.username');
			$client->lang = $request->input('message.from.language_code');
			return $client;
		}

		private function storeMessage(Request $request)
		// create and fill new record in db and instance of Message
		{
			$message = new Message();
			$message->sender = $request->input('message.from.id');
			$message->txt = $request->input('message.text');
			$message->chat = $request->input('message.chat.id');
			$message->fill([
					'sender' => $request->input('message.from.id'),
					'txt' => $request->input('message.text'),
					'chat' => $request->input('message.chat.id')
				]);
			$message->save();
			return $message;
		}
		
	}