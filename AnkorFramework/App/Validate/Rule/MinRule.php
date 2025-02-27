<?php
namespace AnkorFramework\App\Validate\Rule;

use AnkorFramework\App\Validate\RuleInterface;

class MinRule implements RuleInterface
{

    protected $min;

    public function __construct($min)
    {
        $this->min = $min;
    }

    public function passes($value)
    {
        if (is_string($value)) {
            return strlen($value) >= $this->min;
        } elseif (is_numeric($value)) {
            return $value >= $this->min;
        }
        return false;
    }

    public function message($attribute)
    {
        return "$attribute must be at least $this->min characters or values.";
    }
}