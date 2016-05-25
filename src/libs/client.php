<?php

use GuzzleHttp\Client as GuzzleClient;

class client
{
  private $_client = null;

  public function __construct($uri)
  {
    $this->_client = new GuzzleClient([
      'base_uri' => $uri,
      'http_errors' => false,
    ]);
  }

  public function fetch($path, $method, $query = null)
  {
    if (!is_null($query)) {
      $res = $this->_client->$method($path, ['query' => $query]);
    } else {
      $res = $this->_client->$method($path);
    }

    if ($res->getStatusCode() === 200) {
      $res = json_decode($res->getBody(), true);

      return $res;
    }

    return false;
  }
}
