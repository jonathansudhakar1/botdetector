<?php namespace Jonathansudhakar\Botdetector;

class Botdetector {

  public static function detect(){
    return $this->detectBot();
  }

  private static function detectBot()
  {
    $useragent = (Request::server('HTTP_USER_AGENT')==NULL?'':Request::server('HTTP_USER_AGENT'));

    $humans = Config::get('config.humans');

    return in_array($useragent , $humans);
  }

}
