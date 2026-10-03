<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function encrypt_url($string) {
    $output = false;
    $secret_key = 1111111111111111;
    $secret_iv = 2456378494765434;
    $encrypt_method = 'aes-256-cbc';
	$key = hash('sha256', $secret_key);
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    $result = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
    $output = base64_encode($result);
    return $output;
}

function decrypt_url($string) {
    $output = false;
	$secret_key = 1111111111111111;
 	$secret_iv = 2456378494765434;
	$encrypt_method = 'aes-256-cbc';
	$key = hash('sha256', $secret_key);
	$iv = substr(hash('sha256', $secret_iv), 0, 16);
	$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    return $output;
}