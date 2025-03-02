<?php
namespace AnkorFramework\App\Validate\Rule;

use AnkorFramework\App\Validate\RuleInterface;
class FloatRule implements RuleInterface
{
    public function message($attribute)
    {
        return "$attribute must be a float.";
    }

    public function passes($value)
    {
        return is_float($value);
    }
}