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
* ``` $gate->getBalance() ``` will return current balance (float) or false if error occured.
* ```php $gate->getSignatures()  ``` return array of allowed signatures or false if error occured.  Example : ```php [0=>'signat1',1=>'loremsignat'] ```.
* ```php $gate->getPrices()  ```
* addSignature()
* deleteSignature()
* getArchive()
* send()