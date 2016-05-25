<?php

define('BASE_PATH', str_replace('/src/cmd', '', __DIR__));

require_once BASE_PATH.'/src/libs/initializer.php';
require_once BASE_PATH.'/src/libs/client.php';
require_once BASE_PATH.'/src/libs/vendors/rakuten.php';

$rakuten = new Rakuten();
$rakuten->create_query([
  'hotelNo' => '5009',
  'checkinDate' => '2016-06-28',
  'checkoutDate' => '2016-06-29',
  'adultNum' => '2',
  'roomNum' => '1',
  'sort' => 'standard',
]);

$client = new Client($rakuten->get_base_uri());
$res = $client->fetch($rakuten->get_path(), 'get', $rakuten->get_query());
if (!$res) {
  echo '空室データが見つかりませんでした';
  exit();
}

// Parse result data
$info = $res['hotels'][0]['hotel'];
echo '[ホテル名] '.$info[0]['hotelBasicInfo']['hotelName']."\n";

array_shift($info);
foreach ($info as $k => $v) {
  echo "---\n";
  echo '[部屋タイプ] '.$v['roomInfo'][0]['roomBasicInfo']['roomName']."\n";
  echo '[値段] ￥'.number_format((int) $v['roomInfo'][1]['dailyCharge']['rakutenCharge'])."\n";
  echo "---\n";
}
