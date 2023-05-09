<?php
require_once('plugins/login-otp.php');

/** 
* @param string decoded secret, e.g. base32_decode("SECRET")
*/
return new AdminerLoginOtp(
	base64_decode('sj/OjfaO4Ew+VQ==')
);