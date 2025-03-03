<?php
namespace AnkorFramework\App\Validate\Rule;

use AnkorFramework\App\Validate\RuleInterface;

class MaxRule implements RuleInterface
{

    protected $max;

    public function __construct($max)
    {
        $this->max = $max;
    }

    public function passes($value)
    {  
        if (is_string($value)) {
            return strlen($value) <= $this->max;
        } elseif (is_numeric($value)) {
            return $value <= $this->max;
        }
        return false;
    }

    public function message($attribute)
    {
        return "$attribute must not excueed $this->max characters or values.";
    }
}