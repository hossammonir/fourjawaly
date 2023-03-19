## Four Jawaly

Features

    Send SMS.
    Inquiry for Packages & Balance.



### Installation

Add this line to your application's Gemfile:

```bash
composer require hossammonir/fourjawaly
``` 

Publish repository configuration file:

```bash
php artisan vendor:publish --provider="HossamMonir\FourJawaly\FourJawalyServiceProvider"
```

Prepare Environment

Add the following configuration to .env file .
```bash
FOURJAWALY_APP_ID="your app id"
FOURJAWALY_APP_SECRET="your app secret"
FOURJAWALY_DEFAULT_SENDER_ID="Demo"
```

### Usage

Send SMS

```php
use HossamMonir\FourJawaly\FourJawaly;

FourJawaly::setMessage('SMS Message Body')
        ->setNumbers(['966xxxxxxxxx', '966xxxxxxxxx'])
        ->setSenderId('Demo')
        ->send();

```


Inquiries

```php
use HossamMonir\FourJawaly\FourJawaly;

FourJawaly::setOnlyActive(1)
        ->balance();
```

Setters

```php
setOnlyActive = 1 - This will return only active packages.
setOnlyActive = 0 - This will return all packages.
```
