<?php

if(isset($_GET['mobile']) && !empty($_GET['mobile'])) {
    if(isset($_GET['otp']) && !empty($_GET['otp'])) {
        $mobile = htmlentities(trim($_GET['mobile']));
        $otp = htmlentities(trim($_GET['otp']));
        if(strlen($mobile)!=10) { die(json_encode(["message"=>"Enter valid mobile number","code"=>"101"])); }
        if(strlen($otp)<4 || strlen($otp)>9) { die(json_encode(["message"=>"Enter valid OTP","code"=>"102"])); }
    
        // Parameters
        $sender = "SIAC17";
        $authKey = "";
        $msg = urlencode("Hi, please enter $otp as the otp for your mobile verification at SIAC17.");
        $time = time();
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://api.msg91.com/api/sendhttp.php?sender=$sender&route=4&mobiles=$mobile&authkey=$authKey&encrypt=&country=0&message=$msg&flash=&unicode=&schtime=$time&afterminutes=&response=&campaign=",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_SSL_VERIFYHOST => 0,
          CURLOPT_SSL_VERIFYPEER => 0,
        ));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
        }
    }
    else echo json_encode(["message"=>"Enter valid OTP","code"=>"102"]);
}
else echo json_encode(["message"=>"Enter valid mobile number","code"=>"101"]);

?>