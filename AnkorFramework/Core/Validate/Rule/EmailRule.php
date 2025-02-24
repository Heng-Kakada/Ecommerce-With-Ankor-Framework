<?php
namespace AnkorFramework\Core\Validate\Rule;

use AnkorFramework\Core\Validate\RuleInterface;

class EmailRule implements RuleInterface
{
    public function passes($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public function message($attribute)
    {
        return "$attribute must be a valid email address.";
    }
}