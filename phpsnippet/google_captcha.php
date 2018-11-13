<?php

     $captchasecret = '6LfmTHYUAAAAAJGJmUIXGINeeQTQ0jCrphsYfaoT';
     $captcharesponse = $_POST['g-recaptcha-response'];

     if($_SERVER["REMOTE_ADDR"]=="127.0.0.1"){
       $arrContextOptions = array(
         "ssl"=>array(
           "verify_peer" => false,
           "verify_peer_name" => false,
         ),
       );
       $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$captchasecret.'&response='.$captcharesponse.'&remoteip='.$_SERVER['REMOTE_ADDR'], false, stream_context_create($arrContextOptions));
     } else {
       $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$captchasecret.'&response='.$captcharesponse.'&remoteip='.$_SERVER['REMOTE_ADDR']);
     }

     $responseData = json_decode($verifyResponse);
     // print_r($responseData);

?>
