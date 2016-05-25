# The Code for REST Training

Description
---
This script support this:
+ Simulate REST using PHP

Requirements
---
- PHP >= 5.6.*
```
brew install php56
```

Install Dependencies
---

```
You must follow these before running.
$ cd {ROOT_PATH}
$ curl -sS https://getcomposer.org/installer | php
$ php composer.phar install
$ cp .env.sample .env # Set environment variables!
```

Run
---

```
$ cd {ROOT_PATH}
$ php composer.phar self-update; php composer.phar update # If you need there.
$ php src/cmd/run.php
```
