<?php

namespace Mos\Model;

use RedBeanPHP\SimpleModel;
use RedBeanPHP\R;

class Product extends SimpleModel
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var int§
     */
    public $value;
}
