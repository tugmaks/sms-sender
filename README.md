SMS sender library
==================
SMS sender library

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).



Add

```
"tugmaks/sms-sender": "dev-master"
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
By default Itakazan gate use one url to access its api. You can get it via $gate->getGateUrl(). If this gate will use another url or mirrors you can redefine it like this:
```php
use tugmaks/SMS/gates/ItakazanGate;
$gate = new ItakazanGate([
    'login'=>'yourlogin',
    'password'=>'yourpassword',
    'mac'=>'yourmac',
]);
$gate->setGateUrl = 'http://new-api-address.me';

```


Error handling.
Each request to api will return its result or false if error occured. To get error respresentation you can use this code:
```php
if(!$gate->someMethod()){
    //handle error here
    echo $gate->getError();
}

```

Methods.
TODO:
* getBalance()
* getSignatures()
* addSignature()
* deleteSignature()
* getArchive()
* send()