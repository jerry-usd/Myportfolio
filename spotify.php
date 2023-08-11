<?php


//{"access_token":"BQDT67Yk7gAF9AS4g96PLz26_T-IjGmUqSucPrRY1KHFi8L3IBmnYISfM3o1_5qLvl236oitkkJ2aJV06xHr3vk5jJ3Vz_uMhvF2IhGnWRXwUoUxn6x7WiN2772TowyONvbGI1ybRlXJQWVYffRctKOKF29kTHbvrhFkVfUagtT3GusQOq2RbhJrFNipnmaoWMVqb0bOhvk4LgcuOtNyug","token_type":"Bearer","expires_in":3600,"refresh_token":"AQB3QBNf4viO2yQ2b4_EtFNvPhDMSODzije8jYFTt65mcP_UYw1epVNSc6id-Y2CJ0r7vW2F1nEAuLTgs_Azokk5Y2H7slc7QXzqpRlWnlTdFQj8Ip4EGBCgAokqlKLnY50","scope":"streaming user-read-playback-state user-read-currently-playing"}


//{"access_token":"BQDf5FghvCYMgMwNR9WNGnPKuQWqa7Evf0SymtNnd7xircc7OkuQFIV2ZxagbbFHidVwZq5EyNYf46uA-xf31wz_sT8ImoZ-jc1O_F85GqEWkf7gtn6V2jrfCF3VQKEr7dadOZ6YK_ya1PZWl4g2VjqLOmvPbxMp0snOsq0udU7IoAhH4yLpCEbZEJlTGoF5ZPcKhp6XbPxBNUVCunSMwQ","token_type":"Bearer","expires_in":3600,"scope":"streaming user-read-playback-state user-read-currently-playing"}

//BQBTpsLpYZRGSMTjnp09kUpMg_wRPGyX8xKn0XXrMapc_0D-l6-YmhjAC-sgMTH772NtBNdgZPZ4X1-t4iCyKHUGuKHIQ2u9xAhgZsGc2wPC1ysy0fM

//BQAOyTM7BPbODROp_z3oV0pKX51WkturF2U4kKzf6hhKuE9Cbl29lWAGLfouLDUErKZEJ5HnqeRE4owSmV8VuFQEPQj0r-WhJvt-7W4t8i_SkuNhK1NxUFRsM2rDYfn63Qy450tVy8hQtGtVMxJWy4gS1_dAWLpYEfVW22pcdfI7AGpOtN0jDJxuC_He6W2skXCZQZ8Fol9ZvWUm4ka_9A


if (isset($_COOKIE['at'])) {
 $sat=$_COOKIE['at'];

$curl = curl_init();
//https://www.quidax.com/api/v1/users/{user_id}/orders?market={market}&state={state}&order_by=desc
curl_setopt_array($curl, array(
CURLOPT_URL => "https://api.spotify.com/v1/me/player/currently-playing",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  //CURLOPT_POSTFIELDS =>'{"market": "btcusdt", "side": "sell","ord_type": "limit","volume": "0.00119943","price": "29200"}',
  //CURLOPT_POSTFIELDS => array('market' => 'btcusdt','side' => 'sell','ord_type' => 'market','price' => '','volume' => '0.0005'),
   //CURLOPT_POSTFIELDS =>'{"email": "qnkdqqnqd2@kfkf.com", "first_name": "wjkw","last_name": "nqqnk"}',
     CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer ".$sat,
      
      
  ),
 

 

 
   
));

$response = curl_exec($curl);

curl_close($curl);

$hh=json_decode($response, true);


?>

   
              <p class="mb-3">Currently Playing</p>
              <div style=""><img src="<?php echo $hh["item"]["album"]["images"][0]["url"]; ?>" class="container-fluid m-0 p-0 mb-2"></div>
              <span class="white"><?php echo $hh["item"]["artists"][0]["name"]; ?> - <?php echo $hh["item"]["name"];  ?> </span>
         

<?php

}


else{

$str = 'baf191a8badf4ac186e07def0e910069:aa53c07386984b0c94d588e810e3f042';
$rr=base64_encode($str);

$curl = curl_init();
//https://www.quidax.com/api/v1/users/{user_id}/orders?market={market}&state={state}&order_by=desc
curl_setopt_array($curl, array(
CURLOPT_URL => "https://accounts.spotify.com/api/token",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>'grant_type=refresh_token&refresh_token=AQB3QBNf4viO2yQ2b4_EtFNvPhDMSODzije8jYFTt65mcP_UYw1epVNSc6id-Y2CJ0r7vW2F1nEAuLTgs_Azokk5Y2H7slc7QXzqpRlWnlTdFQj8Ip4EGBCgAokqlKLnY50&redirect_uri=https://envy2okxko5x1tv.m.pipedream.net',
  //CURLOPT_POSTFIELDS => array('grant_type' => 'client_credentials'),
   //CURLOPT_POSTFIELDS =>'{"email": "qnkdqqnqd2@kfkf.com", "first_name": "wjkw","last_name": "nqqnk"}',
     CURLOPT_HTTPHEADER => array(
   
      "Content-Type: application/x-www-form-urlencoded",
      "Authorization:  Basic ".$rr
      
  ),
 

 

 
   
));

$response = curl_exec($curl);

curl_close($curl);

$hh=json_decode($response, true);

$at=$hh["access_token"];
setcookie("at", $at, time() + 3550);














 $sat=$_COOKIE['at'];

$curl = curl_init();
//https://www.quidax.com/api/v1/users/{user_id}/orders?market={market}&state={state}&order_by=desc
curl_setopt_array($curl, array(
CURLOPT_URL => "https://api.spotify.com/v1/me/player/currently-playing",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  //CURLOPT_POSTFIELDS =>'{"market": "btcusdt", "side": "sell","ord_type": "limit","volume": "0.00119943","price": "29200"}',
  //CURLOPT_POSTFIELDS => array('market' => 'btcusdt','side' => 'sell','ord_type' => 'market','price' => '','volume' => '0.0005'),
   //CURLOPT_POSTFIELDS =>'{"email": "qnkdqqnqd2@kfkf.com", "first_name": "wjkw","last_name": "nqqnk"}',
     CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer ".$sat,
      
      
  ),
 

 

 
   
));

$response = curl_exec($curl);

curl_close($curl);

$hh=json_decode($response, true);


?>

   
              <p class="mb-3">Currently Playing</p>
              <div style=""><img src="<?php echo $hh["item"]["album"]["images"][0]["url"]; ?>" class="container-fluid m-0 p-0 mb-2"></div>
              <span class="white"><?php echo $hh["item"]["artists"][0]["name"]; ?> - <?php echo $hh["item"]["name"];  ?> </span>
         

<?php








}

    
 ?>

