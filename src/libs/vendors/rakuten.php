<?php

class rakuten
{
  private $_base_uri = 'https://app.rakuten.co.jp/';
  private $_path = 'services/api/Travel/VacantHotelSearch/20131024/';
  private $_query = [];

  public function create_query($query)
  {
    $this->_query = [
      'applicationId' => $_ENV['RAKUTEN_APP_ID'],
      'format' => 'json',
    ];

    $this->_query = array_merge($this->_query, $query);
  }

  public function get_base_uri()
  {
    return $this->_base_uri;
  }

  public function get_path()
  {
    return $this->_path;
  }

  public function get_query()
  {
    return $this->_query;
  }
}
