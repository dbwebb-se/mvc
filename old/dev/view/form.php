<?php

/**
 * Standard view template to generate a simple web page, or part of a web page.
 */

declare(strict_types=1);

$header = $header ?? null;
$message = $message ?? null;
$action = $action ?? null;
$output = $output ?? null;

?><h1><?= $header ?></h1>

<p><?= $message ?></p>

<form method="post" action="<?= $action ?>">
    <p>
        <input type="text" name="content" placeholder="Enter a value and see it in the resultpage.">
    </p>

    <p>
        <input type="submit" value="Press me">
    </p>

    <?php if ($output !== null) : ?>
    <p>
        <output>You have sent the value of:<br>'<?= htmlentities($output) ?>'</output>
    </p>
    <?php endif; ?>
</form>
