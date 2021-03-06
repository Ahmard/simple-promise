<?php
use SimplePromise\Deferred;

require 'vendor/autoload.php';

function test($number)
{
    $deferred = new Deferred();

    if ($number > 2){
        $deferred->resolve('Succeeded');
    }else{
        $deferred->reject(new \Exception('Error occured'));
    }

    return $deferred->promise();
}

test(1)->then(function ($data){
    echo "First: {$data} \n";
})->otherwise(function ($error){
    echo "First: {$error->getMessage()} \n";
});

test(4)->then(function ($data){
    echo "Second: {$data} \n";
})->otherwise(function ($error){
    echo "Second: {$error->getMessage()} \n";
});