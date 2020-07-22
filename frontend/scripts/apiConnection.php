<?php
  function apiConnection($date, $method, $url, $token) {   
    $urlCall = "http://localhost:3333/$url";
    $ch = curl_init($urlCall);
    $json = json_encode($date);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', "authorization: $token"));
    $result = json_decode(curl_exec($ch));
    curl_close($ch);
    return $result;
  }
?>