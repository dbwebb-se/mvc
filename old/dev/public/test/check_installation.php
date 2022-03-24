<?php

$pdo_exists = class_exists('PDO') ? "YES" : "NO";
$pdo_drivers = implode(", ", PDO::getAvailableDrivers());

?>


<h1>Checking installation</h1>

<p>PHP version: <?= PHP_VERSION ?></p>

<p>PDO installed: <?= $pdo_exists ?></p>
<?php if ($pdo_exists) : ?>
<p>PDO drivers: <?= $pdo_drivers ?></p>
<?php endif; ?>
