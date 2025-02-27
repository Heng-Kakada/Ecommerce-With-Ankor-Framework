<?php
namespace AnkorFramework\App\Validate;

interface RuleInterface
{
    public function passes($value);
    public function message($attribute);
}