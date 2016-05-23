<?php
require 'vendor/autoload.php';
$url = 'https://app.rakuten.co.jp/services/api/Travel/VacantHotelSearch/20131024?';

$client = new GuzzleHttp\Client(['base_uri' => $url]);

$response = $client->request('GET', '',['query'=>[
												'applicationId' => '1074234954336267145', 
												'format' => 'json',
												'largeClassCode' => 'japan',
												'middleClassCode' => 'akita',
												'smallClassCode' => 'tazawa',
												'checkinDate' => '2016-08-01',
												'checkoutDate' => '2016-08-03',
												]
									]);

$body = $response->getBody();
//echo $body;
$stringBpdy = (string) $body;
$tenBytes = $body->read(10);
//$remainingBytes = $body->getContens();
$arr = json_decode($stringBpdy);
var_dump($arr);
exit;
//$result = $arr["roomBasicInfo"]["roomClass"];

//var_dump($result->getBody());
// jsonを配列に変換する
// 空き部屋がある場合、値段だけを表示する

