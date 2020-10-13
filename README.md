# Laravel TxtBox
[TxtBox](https://www.txtbox.com/) SMS API for Laravel.

![Packagist Version](https://img.shields.io/packagist/v/woenel/laravel-txtbox)
![Packagist](https://img.shields.io/packagist/l/doctrine/orm.svg)

## What is TxtBox
Txtbox lets you send an SMS with a single line of code. No complicated setup, no dealing with telecom protocols and procedures.

## Requirements
* PHP: 7.2.x
* Laravel: 8.x.x (For Laravel 7.x.x, use version [1.x.x](https://github.com/woenel/laravel-txtbox/releases))
* [TxtBox API Key](https://www.txtbox.com)

## Installation

Install using Composer
```
For Laravel 8:
$ composer require woenel/laravel-txtbox

For Laravel 7:
$ composer require woenel/laravel-txtbox "^1.3"
```

Publish the config file named `txtbox.php` and set the TxtBox API key.
```
$ php artisan vendor:publish --provider="Woenel\TxtBox\TxtBoxServiceProvider"
```

## Usage

### Send a Message
These are the three methods you can use to send a message:

###### 1. Using facade
```
use Woenel\TxtBox\Facades\TxtBox;

$result = TxtBox::to('09123456789')->message('Hello World!')->send();

if($result->success) {
  echo $result->message;
} else {
  echo $result->message;
}
```

###### 2. Instantiating class
```
use Woenel\TxtBox\TxtBox;

$txtbox = new TxtBox;

$result = $txtbox->to('09123456789')->message('Hello World!')->send();

if($result->success) {
  echo $result->message;
} else {
  echo $result->message;
}
```

###### 3. Instantiating class (one-by-one)
```
use Woenel\TxtBox\TxtBox;

$txtbox = new TxtBox;

$txtbox->to = '09123456789';
$txtbox->message = 'Hello World!';
$result = $txtbox->send();

if($result->success) {
  echo $result->message;
} else {
  echo $result->message;
}
```

## Success and Failure returns
TxtBox Laravel API returns object-type values.

### Success

**Message successfully sent to 09XXXXXXXXX**\
This happens when you successfully sent a message.

```
{
  "success": true,
  "message": 'Message successfully sent to 09XXXXXXXXX'
}
```

### Failures

**Invalid Token**\
This happens when you did not provide a valid API key. API key can be modified in `txtbox.php` file under `config` folder.

```
{
  "success": false,
  "message": 'Invalid Token'
}
```

**Unprocessable Entity**\
This happens when you did not enter a value. **Number** `to()` and **Message** `message()` are both required entities.

```
{
  "success": false,
  "message": 'Unprocessable Entity',
  "errors": {
    "number": [
      0 => 'The message field is required.'
    ],
    "message": [
      0 => 'The number field is required.'
    ]
  }
}
```

**Insufficient credits. Please buy more credit to use this service.**\
This happens when you already used all of your SMS credits.
```
{
  "success": false,
  "message": 'Insufficient credits. Please buy more credit to use this service.'
}
```
