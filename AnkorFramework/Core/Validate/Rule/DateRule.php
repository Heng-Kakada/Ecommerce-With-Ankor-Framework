<?php
namespace AnkorFramework\Core\Validate\Rule;

use DateTime;
use AnkorFramework\Core\Validate\RuleInterface;

class DateRule implements RuleInterface
{
    public function passes($value)
    {
        return DateTime::createFromFormat('Y-m-d', $value);
    }

    public function message($attribute)
    {
        return "$attribute must be a valid date (Y-m-d).";
    }
}