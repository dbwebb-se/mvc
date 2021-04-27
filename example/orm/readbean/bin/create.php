<?php

use Mos\Model\Product;
use RedBeanPHP\R;

require_once __DIR__ . "/bootstrap.php";

if ($argc !== 3) {
    echo "Usage ${argv[0]} <name> <value>\n";
    exit(1);
}

$newProductName = $argv[1];
$newProductValue = $argv[2];

$product = R::dispense("product");
$product->name = $newProductName;
$product->value = $newProductValue;

$id = R::store($product);

echo "Created Product with ID " . $id . "\n";
