<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

abstract class Answer extends Model
{
    const API_URL = 'https://api.telegram.org/bot1192179475:AAFCUUNnifhdihCOCnmqNL4HRNbGrfU2His/sendMessage?';
    private $Chat_id;
    private $Alert;
    
    abstract public function makeUrl();
  /*  
    public function send ($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        if (!isset($response))
            return null;
        return $response;
    }
		*/
    public function getChatId(): int
    {
    	return $this->Chat_id;
    }

    public function getAlert(): string
    {
    	return $this->Alert;
    }

    public function setChatId(int $Chat_id)
    {
    	$this->Chat_id = $Chat_id;
    }

    public function setAlert(string $Alert)
    {
    	$this->Alert = $Alert;
    }
}