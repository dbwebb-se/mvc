<?php

require_once __DIR__ . "/bootstrap.php";

$productRepository = $entityManager->getRepository('\Mos\Product\Product');
$products = $productRepository->findAll();

echo "All products\n--------------------\n";

if ($products) {
    foreach ($products as $product) {
        echo sprintf("%2d - %s (%d)\n",
            $product->getId(),
            $product->getName(),
            $product->getValue()
        );
    }
} else {
    echo " (empty)\n";
}
