## Robot detector for Laravel 4
***

## Installation

Add to composer.json:
```
require: "jonathansudhakar/botdetector": "dev-master"
```

Add to 'providers' in app/config/app.php
```
'Jonathansudhakar\Botdetector\BotdetectorServiceProvider'
```

## Basic Usage
***
Detect if the the current request is a bot
```
Botdetector::isBot(); // returns true or false
Botdetector::detect()->isBot(); // returns true or false
```
Detect if the the current request is human
```
Botdetector::isHuman(); // returns true or false
Botdetector::detect()->isHuman(); // returns true or false
```
Detect if the a user-agent string is a bot (or Human)
```
Botdetector::isBot("user-agent-string"); // returns true or false
Botdetector::detect("user-agent-string")->isBot(); // returns true or false
```

## More Options
***
Get user-agent string
```
Botdetector::detect()->getAgent(); //returns user-agent string
Botdetector::detect("user-agent-string")->getAgent(); //returns user-agent string
```
Get list of user-agent strings being tested against apart from '/bot|crawl|slurp|spider/i' and '/Chrome\/|Firefox\/|Safari\//i'.
```
Botdetector::detect()->getHumans(); //returns array with defaults
Botdetector::detect()->getBots(); //returns array with defaults
Botdetector::detect()->getHumans(false); //returns array without defaults
Botdetector::detect()->getBots(false); //returns array without defaults
```
Add list of user-agent strings to test against apart from '/bot|crawl|slurp|spider/i' and '/Chrome\/|Firefox\/|Safari\//i'.
```
Botdetector::detect()->addHumans(array('list','of','human','user-agent strings'))->isBot(); //adds an array of humans to list of defaults
Botdetector::detect()->addBots(array('list','of','bot','user-agent strings'))->isBot(); //adds an array of bots to list of defaults
```
Option to not test against defaults including '/bot|crawl|slurp|spider/i' and '/Chrome\/|Firefox\/|Safari\//i'.
```
Botdetector::detect()->ignoreDefaults()->isBot(); // Defaults to true if not set
Botdetector::detect()->ignoreDefaults(false)->isBot(); // Default setting
```
Option to test against a list of humans or bots in making a decision. Defaults to human.
```
Botdetector::detect()->useHumanData()->isBot(); // Defaults setting; Defaults to true
Botdetector::detect()->useHumanData(false)->isBot(); //Compares user-agent string against list of bots
```
Option to set empty string or null as bot or human. Defaults to bot.
```
Botdetector::detect()->isNullBot()->isBot(); // Defaults setting; Defaults to true
Botdetector::detect()->isNullBot(false)->isBot(); //Empty string/null reported as human
```
Functions can also be cascaded. Example:
```
Botdetector::detect("user-agent-string")->addHumans(array('list','of','human','user-agent strings'))->ignoreDefaults()->useHumanData()->isNullBot()->isBot();
Botdetector::detect()->addBots(array('list','of','bot','user-agent strings'))->ignoreDefaults(false)->useHumanData(false)->isNullBot(false)->getBots();
```


## Intial Release Version v0.9
