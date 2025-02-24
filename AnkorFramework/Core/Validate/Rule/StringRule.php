<?php
namespace AnkorFramework\Core\Validate\Rule;

use AnkorFramework\Core\Validate\RuleInterface;

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