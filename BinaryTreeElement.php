<?php

namespace Dinar\NewClass\BinaryTreeExperiments;

class BinaryTreeElement
{
    public $leftBranch;
    public $rightBranch;
    public $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

}