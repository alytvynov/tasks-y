<?php

$loader = require __DIR__ . '/vendor/autoload.php';
$loader->addPsr4('Acme\\Test\\', __DIR__);

use App\Task1\MultipleService;
use App\Task2\GridService;

echo "Tast#1\n";
$sum = (new MultipleService())->getSum([3, 5], 1000);
echo sprintf("Sum : %s\n", $sum);

echo "\n";
echo "Tast#2\n";
$s2 = new GridService();
$s2->print();
$greatestProduction = $s2->getGreatestProduction();
echo sprintf("Greatest production : %s\n", $greatestProduction);

$s2->printWithResult();

