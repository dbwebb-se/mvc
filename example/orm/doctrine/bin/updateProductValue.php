<?php

require_once __DIR__ . "/bootstrap.php";

if ($argc !== 3) {
    echo "Usage ${argv[0]} <id> <new value>\n";
    exit(1);
}

$id = $argv[1];
$value = $argv[2];
$product = $entityManager->find('\Mos\Product\Product', $id);

if ($product === null) {
    echo "No product found.\n";
    exit(1);
}

echo sprintf("%2d - %s (%d)\n",
    $product->getId(),
    $product->getName(),
    $product->getValue()
);

$product->setValue($value);
echo "New value '$value' save to product id: '" . $product->getId() . "'\n";
$entityManager->flush();
