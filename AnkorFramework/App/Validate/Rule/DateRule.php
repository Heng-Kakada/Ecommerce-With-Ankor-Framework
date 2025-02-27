<?php
namespace AnkorFramework\App\Validate\Rule;

use DateTime;
use AnkorFramework\App\Validate\RuleInterface;

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