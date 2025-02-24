<?php
namespace AnkorFramework\Core\Validate;

interface RuleInterface
{
    public function passes($value);
    public function message($attribute);
}