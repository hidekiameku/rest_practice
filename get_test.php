<?php
$url = 'http://www.yahoo.co.jp/';
 
$options = array(
    'http' => array('ignore_errors' => true)
);
$context = stream_context_create($options);
 
$result = file_get_contents($url, false, $context);
 
var_dump($result);
var_dump($http_response_header);