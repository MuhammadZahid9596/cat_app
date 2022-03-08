<?php
// include '../config/header.php';
include '../config/conn.php';

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.thecatapi.com/v1/favourites/".$_POST['id'],
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'DELETE',
  CURLOPT_HTTPHEADER => array(
    'x-api-key: 8175f91c-3fcc-44ee-83f9-a4d66ff8b331',
    'Content-Type: application/json'
  ),
));

$server_output = curl_exec($curl);

curl_close ($curl);

$result = json_decode($server_output,true);
echo json_encode($result);
?>
