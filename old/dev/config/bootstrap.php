<?php

/**
 * Setup the basis for the environment.
 */

declare(strict_types=1);

// Setup error reporting
error_reporting(-1);                // Report all type of errors
ini_set("display_errors", "1");     // Display all errors

// Use Whoops to display errors
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

// Start the session
if (php_sapi_name() !== "cli") {
    session_name(preg_replace("/[^a-z\d]/i", "", __DIR__));
    session_start();
}

// // Default exception handler.
// set_exception_handler(function ($e) {
//     echo "<p>Default exception handler: Uncaught exception:</p><p>Line "
//         . $e->getLine()
//         . " in file "
//         . $e->getFile()
//         . "</p><p><code>"
//         . get_class($e)
//         . "</code></p><p>"
//         . $e->getMessage()
//         . "</p><p>Code: "
//         . $e->getCode()
//         . "</p><pre>"
//         . $e->getTraceAsString()
//         . "</pre>";
// });
