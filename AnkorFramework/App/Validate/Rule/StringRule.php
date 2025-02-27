<?php
namespace AnkorFramework\App\Validate\Rule;

use AnkorFramework\App\Validate\RuleInterface;

class StringRule implements RuleInterface
{
    public function message($attribute)
    {
        return "$attribute must be a string";
    }

    public function passes($value)
    {
        return is_string($value);
    }
}