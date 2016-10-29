<?php
	$public_key='-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA0aoqFu0b727eEjdcDYGf
p/VaaN+C/v7X6nE7Owh0MfNh+cuxq259xJoKjDkvSBtIcfnJ2Wj8F4GQAt1gAvZm
2oWAf4D9U1LrjmBWhkmHhCOTi0a9tCVs8Yj2WLc82d3NXOx4GU7irLy052ugrBco
Jtz51pGVcWWkE+FFzkrNttzqAbq0kTcNw4OTAIXaQFZQx+XXTHOhncuNB7C7H8lQ
KdTDrRfJtWZpuLkVVmivbjhlZcQsmPs7VRTvBlNNUqufGPOLf6Y9em12JkJ6WxW+
QyicDewyqyypyi38DApSV5ZgjdXw7Pv0s7fSh9RWHEikJVW1CDjAx93+HBkHD+6R
mQIDAQAB
-----END PUBLIC KEY-----';
function get_tip_link_js_source(){
	return '<script src="https://www.bitevery.com/be-js/tip_button.js"></script>';
}

function create_tip_link($icon_id,$height,$creator_email,$creator_api_access_code, $email_1,$nickname_1,$dist_1=100,$email_2="",$nickname_2="",$dist_2=0){
	$public_key='-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA0aoqFu0b727eEjdcDYGf
p/VaaN+C/v7X6nE7Owh0MfNh+cuxq259xJoKjDkvSBtIcfnJ2Wj8F4GQAt1gAvZm
2oWAf4D9U1LrjmBWhkmHhCOTi0a9tCVs8Yj2WLc82d3NXOx4GU7irLy052ugrBco
Jtz51pGVcWWkE+FFzkrNttzqAbq0kTcNw4OTAIXaQFZQx+XXTHOhncuNB7C7H8lQ
KdTDrRfJtWZpuLkVVmivbjhlZcQsmPs7VRTvBlNNUqufGPOLf6Y9em12JkJ6WxW+
QyicDewyqyypyi38DApSV5ZgjdXw7Pv0s7fSh9RWHEikJVW1CDjAx93+HBkHD+6R
mQIDAQAB
-----END PUBLIC KEY-----';
	
	$pu_key = openssl_pkey_get_public($public_key);//check if public key is valid
	
	//initizlize encrypted data
	$creator_email_encrypted = "";
	$creator_api_code_encrypted = "";
	$email_1_encrypted = "";
	$email_2_encrypted = "";
	
	//encrypt data
	openssl_public_encrypt($creator_email,$creator_email_encrypted,$pu_key);
	$creator_email_encrypted = base64_encode($creator_email_encrypted);
	echo $creator_email_encrypted;
	openssl_public_encrypt($creator_api_access_code,$creator_api_code_encrypted,$pu_key);
	$creator_api_code_encrypted = base64_encode($creator_api_code_encrypted);
	openssl_public_encrypt($email_1,$email_1_encrypted,$pu_key);
	$email_1_encrypted = base64_encode($email_1_encrypted);
	openssl_public_encrypt($email_2,$email_2_encrypted,$pu_key);	
	$email_2_encrypted = base64_encode($email_2_encrypted);
	
	$uniq_id = substr(uniqid(),8,5);
	
	return '<div id="bitEveryTip'.$uniq_id.'"></div><script>api_tip_btn_setup("'.$uniq_id.'",'.$icon_id.','.$height.',"'.$creator_email_encrypted.'","'.$creator_api_code_encrypted.'","'.$email_1_encrypted.'","'.$nickname_1.'",'.$dist_1.',"'.$email_2_encrypted.'","'.$nickname_2.'",'.$dist_2.');</script>';
}

?>
