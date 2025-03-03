<?php
namespace AnkorFramework\App\Validate\Rule;

use AnkorFramework\App\Validate\RuleInterface;

class MatchRule implements RuleInterface
{
    protected $compareField;

    protected $fullData;
    public function __construct($compareField)
    {
        $this->compareField = $compareField;
    }

    public function passes($value)
    {
        // This method will be called with the value to compare 
        // and relies on the Validator to pass the full data array
        return isset($this->fullData) &&
            isset($this->fullData[$this->compareField]) &&
            $value === $this->fullData[$this->compareField];
    }

    public function message($attribute)
    {
        return "$attribute must match $this->compareField.";
    }

    // New method to set the full data array
    public function setFullData($data)
    {
        $this->fullData = $data;
        return $this;
    }
}