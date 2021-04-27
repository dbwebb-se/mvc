<?php

use RedBeanPHP\R;

require_once __DIR__ . "/../vendor/autoload.php";

define( 'REDBEAN_MODEL_PREFIX', '\\Mos\\Model\\');

R::setup("sqlite:" . __DIR__ . "/../db/db.sqlite");
