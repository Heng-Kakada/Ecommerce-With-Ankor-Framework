<?php
namespace AnkorFramework\App\Validate;

use AnkorFramework\App\Validate\Rule\DateRule;
use AnkorFramework\App\Validate\Rule\EmailRule;
use AnkorFramework\App\Validate\Rule\FloatRule;
use AnkorFramework\App\Validate\Rule\IntegerRule;
use AnkorFramework\App\Validate\Rule\MatchRule;
use AnkorFramework\App\Validate\Rule\MaxRule;
use AnkorFramework\App\Validate\Rule\MinRule;
use AnkorFramework\App\Validate\Rule\RequiredRule;
use AnkorFramework\App\Validate\Rule\StringRule;
use AnkorFramework\App\Validate\Rule\StrongPassword;
use AnkorFramework\App\Validate\Rule\UniqueRule;

class Validator
{

    protected static $ruleMap = [
        'required' => RequiredRule::class,
        'string' => StringRule::class,
        'integer' => IntegerRule::class,
        'float' => FloatRule::class,
        'min' => MinRule::class,
        'max' => MaxRule::class,
        'email' => EmailRule::class,
        'date' => DateRule::class,
        'strong_password' => StrongPassword::class,
        'match' => MatchRule::class,
        'unique' => UniqueRule::class,
    ];


    public static function validate(array $data = [], array $rules = [])
    {
        $errors = [];

        foreach ($rules as $field => $ruleSet) {
            $rulesArray = explode('|', $ruleSet);
            foreach ($rulesArray as $rule) {
                $parts = explode(':', $rule, 2);
                $ruleName = $parts[0];
                $parameter = $parts[1] ?? null;

                if (isset(self::$ruleMap[$ruleName])) {
                    $ruleInstance = ($parameter !== null) ? new self::$ruleMap[$ruleName]($parameter) : new self::$ruleMap[$ruleName];

                    // Special handling for match rule
                    if ($ruleName === 'match' && method_exists($ruleInstance, 'setFullData')) {
                        $ruleInstance->setFullData($data);
                    }

                    $value = $data[$field] ?? null;

                    if (!$ruleInstance->passes($value)) {
                        $errors[$field] = $ruleInstance->message($field);
                    }
                }
            }
        }

        if (!empty($errors)) {
            throw new ValidationException($errors);
        }
    }


}