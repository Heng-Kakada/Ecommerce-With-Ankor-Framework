<?php

namespace AnkorFramework\Core\Validate\Rule;

use AnkorFramework\Core\Validate\RuleInterface;

class RequiredRule implements RuleInterface
{
    public function message($attribute)
    {
        return "$attribute is required.";
    }

    public function passes($value)
    {
        return isset($value) && $value !== '';
    }
}