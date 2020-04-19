<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

abstract class Answer extends Model
{
    private $api_url = 'https://api.telegram.org/bot1192179475:AAFCUUNnifhdihCOCnmqNL4HRNbGrfU2His/sendMessage?';
    private $chat_id;
    private $text;
    
    abstract public function makeUrl(array $params);

    public function get_api_url()
    {
    	return $this->api_url;
    }

    public function get_chat_id()
    {
    	return $this->chat_id;
    }

    public function get_text()
    {
    	return $this->text;
    }

    public function set_chat_id($chat_id)
    {
    	$this->chat_id = $chat_id;
    }

    public function set_text($text)
    {
    	$this->text = $text;
    }
}