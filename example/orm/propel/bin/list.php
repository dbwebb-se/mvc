<?php

use Mos\Model\Product;
use RedBeanPHP\R;

require_once __DIR__ . "/bootstrap.php";

$products = R::findAll("product");

echo "All products\n--------------------\n";

if ($products) {
    foreach ($products as $product) {
        echo sprintf("%2d - %s (%d)\n",
            $product->id,
            $product->name,
            $product->value
        );
    }
} else {
    echo " (empty)\n";
}
