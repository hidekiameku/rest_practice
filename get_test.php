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

$arr = json_decode($response,true);
var_dump($arr);
exit;
$result = $arr["roomBasicInfo"]["roomClass"];

var_dump((string)$result->getBody());
// jsonを配列に変換する
// 空き部屋がある場合、値段だけを表示する

