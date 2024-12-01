<?php

namespace App\Helpers;

class TokenHelper
{
    public function index()
    {
    }

    public function generate_token(string $username, string $password) {
		$current_date = date("d"); 
		$current_month = date("m"); 
		$current_year = date("Y"); 
		$current_hour = date("H"); 
		$current_minute = date("i"); 
		$current_second = date("s"); 
	
		
		$token_string = "{$username}|{$password}|{$current_date}-{$current_month}-{$current_year} {$current_hour}:{$current_minute}:{$current_second}";
	
		
		$encoded_token = base64_encode($token_string);
		
		return $encoded_token;
	}

    public function decode_token($encoded_token) {
        $decoded_string = base64_decode($encoded_token);

        return explode("|", $decoded_string);
    }
}