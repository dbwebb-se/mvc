<!doctype html>
<html>
    <meta charset="utf-8">
    <title><?= $title ?? "No title" ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= \Mos\url("/favicon.ico") ?>">
    <link rel="stylesheet" type="text/css" href="<?= \Mos\url("/css/style.css") ?>">
</head>

<body>

<header>
    <nav>
        <a href="<?= Mos\url("/") ?>">Home</a> |
        <a href="<?= Mos\url("/session") ?>">Session</a> |
        <a href="<?= Mos\url("/debug") ?>">Debug</a> |
        <a href="<?= Mos\url("/some/where") ?>">some/where</a> |
        <a href="<?= Mos\url("/no/such/path") ?>">Show 404 example</a>
    </nav>
</header>
<main>
