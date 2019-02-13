<?php
if(!defined('INITIALIZED'))
	exit;

require_once('recaptchalib.php');
		
$public_key = "6LcNXhwTAAAAAH3nbANsJ816eMCbTjaoPZrjBA9K";
$secret_key = "6LcNXhwTAAAAAPYsjvZN7Y1VmNqqxIwuMjvmUCB9";

$error_captcha = false;

if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'logout')
	Visitor::logout();
if(isset($_REQUEST['account_login']) && isset($_REQUEST['password_login']))
{
	if(isset($_POST['g-recaptcha-response'])) {
		$captcha_data = htmlspecialchars($_POST['g-recaptcha-response']);
		
		$url = "https://www.google.com/recaptcha/api/siteverify?secret=".$secret_key."&response=".$captcha_data."&remoteip=".$_SERVER['REMOTE_ADDR'];
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		$data = curl_exec($ch);
		curl_close($ch);
		  
		$return = json_decode($data, true);
				
		if($return['success']){
				
			Visitor::setAccount($_REQUEST['account_login']);
			Visitor::setPassword($_REQUEST['password_login']);
			//Visitor::login(); // this set account and password from code above as login and password to next login attempt
			//Visitor::loadAccount(); // this is required to force reload account and get status of user
			$isTryingToLogin = true;
			
		}else{
			$error_captcha = true;
			$reg_form_errors[] = "<b>Verification code is empty or incorrect.</b>";
		}
	}
}
Visitor::login();