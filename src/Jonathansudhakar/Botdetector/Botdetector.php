<?php

namespace Jonathansudhakar\Botdetector;

class Botdetector
{

  public static function detect($userAgent = null)
  {
      if(is_null($userAgent))
      {
          $agent = new UserAgent((!isset($_SERVER['HTTP_USER_AGENT']) || is_null($_SERVER['HTTP_USER_AGENT'])) ? "" : $_SERVER['HTTP_USER_AGENT']);
      }
      else
      {
          $agent = new UserAgent($userAgent);
      }
      return $agent;
  }

  public static function isBot($userAgent = null)
  {
      if(is_null($userAgent))
      {
          $agent = new UserAgent((!isset($_SERVER['HTTP_USER_AGENT']) || is_null($_SERVER['HTTP_USER_AGENT'])) ? "" : $_SERVER['HTTP_USER_AGENT']);
      }
      else
      {
          $agent = new UserAgent($userAgent);
      }
      return $agent->isBot();
  }

  public static function isHuman($userAgent = null)
  {
      if(is_null($userAgent))
      {
          $agent = new UserAgent((!isset($_SERVER['HTTP_USER_AGENT']) || is_null($_SERVER['HTTP_USER_AGENT'])) ? "" : $_SERVER['HTTP_USER_AGENT']);
      }
      else
      {
          $agent = new UserAgent($userAgent);
      }
      return $agent->isHuman();
  }

}
