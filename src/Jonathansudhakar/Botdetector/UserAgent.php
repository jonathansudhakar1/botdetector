<?php

namespace Jonathansudhakar\Botdetector;

use Config;

class UserAgent
{
    private $_userAgent = "";

    private $_useHumanData = true;

    private $_ignoreDefault = false;

    private $_isNullBot = true;

    private $_humanData = array();

    private $_botData = array();

    public function __construct($userAgent)
  	{
        $this->_userAgent = $userAgent;
  	}

    public function setAgent($userAgent)
    {
        $this->_userAgent = $userAgent;

        return $this;
    }

    public function getAgent()
    {
        return $this->$_userAgent;
    }

    public function isBot()
    {
        if(is_null($this->_userAgent) || "" == $this->_userAgent || " " == $this->_userAgent)
        {
            return $this->_isNullBot;
        }

        if(preg_match('/bot|crawl|slurp|spider/i', $this->_userAgent))
        {
            return true;
        }

        if($this->_useHumanData)
        {
            if(!$this->_ignoreDefault)
            {
                return (!in_array($this->_userAgent , $this->getHumans(true)));
            }
            else
            {
                return (!in_array($this->_userAgent , $this->getHumans(false)));
            }
        }
        else
        {
            if(!$this->_ignoreDefault)
            {
                return (in_array($this->_userAgent , $this->getBots(true)));
            }
            else
            {
                return (in_array($this->_userAgent , $this->getBots(false)));
            }
        }
    }

    public function isHuman()
    {
        return !$this->isBot();
    }

    public function getHumans($withDefaults = true)
    {
        if($withDefaults)
        {
            return array_merge(Config::get('botdetector::humans'), $this->_humanData);
        }
        else
        {
            return $this->_humamData;
        }
    }

    public function getBots($withDefaults = true)
    {
        if($withDefaults)
        {
            return array_merge(Config::get('botdetector::bots'), $this->_botData);
        }
        else
        {
            return $this->_botData;
        }
    }

    public function addHumans($humanData = array())
    {
        $this->_humanData = array_merge($this->_humanData, $humanData);

        return $this;
    }

    public function addBots($botData = array())
    {
        $this->_botData = array_merge($this->_botData, $botData);

        return $this;
    }

    public function ignoreDefaults($ignoreDefaults = true)
    {
        $this->_ignoreDefault = $ignoreDefaults;

        return $this;
    }

    public function useHumanData($useHumanData = true)
    {
        $this->_useHumanData = $useHumanData;

        return $this;
    }

    public function isNullBot($isNullBot = true)
    {
        $this->_isNullBot = $isNullBot;

        return $this;
    }
}
