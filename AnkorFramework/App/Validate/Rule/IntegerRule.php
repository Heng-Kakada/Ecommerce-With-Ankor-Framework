<?php
namespace AnkorFramework\App\Validate\Rule;

use AnkorFramework\App\Validate\RuleInterface;
class IntegerRule implements RuleInterface
{
    public function message($attribute)
    {
        return "$attribute must be an integer.";
    }

    public function passes($value)
    {
        return is_int($value);
    }
}