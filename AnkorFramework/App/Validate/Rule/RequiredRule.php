<?php

namespace AnkorFramework\App\Validate\Rule;

use AnkorFramework\App\Validate\RuleInterface;

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