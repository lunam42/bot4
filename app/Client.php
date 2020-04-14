<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class Client extends Model
	{
		protected $guarded = [];
		protected $primaryKey = 'client_id';
		public $incrementing = false;
		public $client_id;
		public $client_nick;
		public $client_lang;

		public function countMessages()
		{
			return $this->hasMany('App\Message', 'owner_id', 'client_id');
		}
	}
