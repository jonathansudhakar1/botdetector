<?php namespace Jonathansudhakar\Botdetector;

use Config;

class Botdetector {

  public static function detect(){
    return Botdetector::detectBot();
  }

  private static function detectBot()
  {
    $useragent = ($_SERVER['HTTP_USER_AGENT']==NULL?'':$_SERVER['HTTP_USER_AGENT']);

    $humans = Config::get('botdetector::humans');

    return (!in_array($useragent , $humans));
  }

}
