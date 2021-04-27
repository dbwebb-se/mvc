<?php

use Mos\Product\Product;

require_once __DIR__ . "/bootstrap.php";

if ($argc !== 3) {
    echo "Usage ${argv[0]} <name> <value>\n";
    exit(1);
}

$newProductName = $argv[1];
$newProductValue = $argv[2];

$product = new Product();
$product->setName($newProductName);
$product->setValue($newProductValue);

$entityManager->persist($product);
$entityManager->flush();

echo "Created Product with ID " . $product->getId() . "\n";
