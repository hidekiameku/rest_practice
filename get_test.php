<?php
require 'vendor/autoload.php';
//use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;

function vacancySerch($id, $in, $out)
{
	$url = 'https://app.rakuten.co.jp/services/api/Travel/VacantHotelSearch/20131024?';

	$client = new GuzzleHttp\Client(['base_uri' => $url]);
	try{
		$response = $client->request('GET', '',['query'=>[
														'applicationId' => '1074234954336267145', 
														'format' => 'json',
														'hotelNo' =>'5009',
														'checkinDate' => $in,
														'checkoutDate' => $out,
														'adultNum' => '1',
														'roomNum' => '1',
														'sort' =>  'standard',
														]
											]);


	}catch(RequestException $e) {
	 	echo "空室データはありません。";
	 	return;
	}

	$body = $response->getBody();
	$stringBody = (string) $body;
	$arr = json_decode($stringBody,true);

	$hotels = $arr['hotels'][0]['hotel'];

	$hotel = $hotels[0]['hotelBasicInfo']['hotelName'];

	echo "ホテル名:". $hotel."\n";

	foreach ($hotels as $key => $val) {
		if($key === 0){
			continue;
		}

	$roomName = $val['roomInfo'][0]['roomBasicInfo']['roomName'];
	$charge = $val['roomInfo'][1]['dailyCharge']['rakutenCharge'];

	echo "ルームネーム:".$roomName."\n";
	echo "値段:".$charge."円\n";

	}
}

	$id = '5009';
	$in = '2016-06-28';
	$out = '2016-06-29';
	vacancySerch($id, $in, $out);


	$id = '5009';
	$in = '2016-07-28';
	$out = '2016-07-29';
	vacancySerch($id, $in, $out);

