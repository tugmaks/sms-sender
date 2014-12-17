SMS sender library
==================
SMS sender library

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist tugmaks/sms-sender "*"
```

or add

```
"tugmaks/sms-sender": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
use tugmaks/SMS/gates/ItakazanGate;
$gate = new ItakazanGate([
    'login'=>'yourlogin',
    'password'=>'yourpassword',
    'mac'=>'yourmac',
]);

echo $gate->getBalance();

```