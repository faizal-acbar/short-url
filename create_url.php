<?php
if(isset($_POST['submit_url']))
{
 $long_url=$_POST['url_val'];
 $apiKey = 'Your API Key';

 $data = array('longUrl' => $long_Url, 'key' => $apiKey);
 $jsonData = json_encode($data);

 $curlObj = curl_init();

 curl_setopt($curlObj, CURLOPT_URL, 'https://www.googleapis.com/urlshortener/v1/url');
 curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, 0);
 curl_setopt($curlObj, CURLOPT_HEADER, 0);
 curl_setopt($curlObj, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
 curl_setopt($curlObj, CURLOPT_POST, 1);
 curl_setopt($curlObj, CURLOPT_POSTFIELDS, $jsonData);

 $response = curl_exec($curlObj);

 // Change the response json string to object
 $json = json_decode($response);

 curl_close($curlObj);

 echo 'Your Short URL is: '.$json->id;
}
?>
