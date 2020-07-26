# Simple Promise

A simple PHP promise library that works synchronously.

### Note
Please  note that this library cannot be used in Asynchronous projects, projects like
[ReactPHP](https://reactphp.org) or [Amphp](https://amphp.org).

### Installation
Make sure that you have composer installed
[Composer](http://getcomposer.org).

If you don't have Composer run the below command
```bash
curl -sS https://getcomposer.org/installer | php
```

Run the installation
```php
composer require ahmard/simple-promise ^1.0
```

### Usage
```php
<?php
use SimplePromise\Deferred;

require 'vendor/autoload.php';

function test($number)
{
    $deferred = new Deferred();
    
    if ($number > 2){
        $deferred->resolve('Succeeded');
    }else{
        $deferred->reject('Failed');
    }
    
    return $deferred->promise();
}

test(1)->then(function ($data){
    echo $data;
})->otherwise(function ($error){
    echo $error;
});
```

### [Examples](examples)