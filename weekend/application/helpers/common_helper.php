<?php 

function encryptData($data) {
	$encription = base64_encode($data['email'].'#'.$data['id']);
	return $encription;
}

function decryptData($string) {
	$out_string = base64_decode($string);
	$actual_string = explode("#",$out_string);
	$data['email'] = $actual_string[0];
	$data['id'] = $actual_string[1];
	return $data;
}

?>