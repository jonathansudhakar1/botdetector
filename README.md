## Robot detector for Laravel
***

## Installation

Add to composer.json:
```
require: "jonathansudhakar/botdetector": "dev-master"
```

Add config/app.php
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
