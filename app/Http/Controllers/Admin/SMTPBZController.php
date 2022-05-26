<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SMTPBZController extends Controller
{
    public function send_mail($subject, $to, $html)
	{
		$api_key = env('SMTPBZ_APP_KEY', null);
		
		$data = [
			'from' => env('SMTPBZ_EMAIL_FROM', null),
			'to' => $to,
			'name' => env('SMTPBZ_EMAIL_FROM_NAME', null),
			'subject' => $subject,
			'html' => $html
		];
		
		
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => 'https://api.smtp.bz/v1/smtp/send',
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => 'POST',
		  CURLOPT_POSTFIELDS => http_build_query($data),
		  CURLOPT_HTTPHEADER => array(
			'Authorization: '.$api_key,
			'Content-Type: application/x-www-form-urlencoded'
		  ),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		return $response;
	}
}
