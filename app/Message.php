<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class Message extends Model
	{
		protected $guarded = [];
		protected $primaryKey = 'message_id';
		public $incrementing = false;
		public $message_id;
		public $owner_id;
		public $message_txt;
		public $message_chat;

	}
