<?php

require_once __DIR__ . "/bootstrap.php";

if ($argc !== 2) {
    echo "Usage ${argv[0]} <id>\n";
    exit(1);
}

$id = $argv[1];
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
