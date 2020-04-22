<?php
	namespace App\Http\Controllers;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use App\Models\Client;
	use App\Models\Message;
	use App\Models\Answer;
	use App\Models\AnswerStart;
	use App\Models\AnswerLast;
	use App\Models\AnswerDiv;
	
	class TlgUpdateController extends Controller
	{
		public function all(Request $request)
		{	
			$Client = $this->storeClient($request);
			$Message = $this->storeMessage($request);
			dd($Message->whatCommand());
			
		}

		private function storeClient(Request $request): Client
		// update/create new record in db and new instance of Client, fill its properties with data from request 
		{
			$Client = \App\Models\Client::updateOrCreate(
		    ['tlg_id' => $request->input('message.from.id')],
		    ['nick' => $request->input('message.from.username'), 'lang' => $request->input('message.from.language_code')]
			);
			$Client->Tlg_id = $request->input('message.from.id');
			$Client->Nick = $request->input('message.from.username');
			$Client->Lang = $request->input('message.from.language_code');
			return $Client;
		}

		private function storeMessage(Request $request): Message
		// create and fill new record in db and instance of Message
		{
			$Message = new Message();
			$Message->Sender = $request->input('message.from.id');
			$Message->Txt = $request->input('message.text');
			$Message->Chat = $request->input('message.chat.id');
			$Message->fill([
					'sender' => $request->input('message.from.id'),
					'txt' => $request->input('message.text'),
					'chat' => $request->input('message.chat.id')
				]);
			$Message->save();
			return $Message;
		}
		
	}