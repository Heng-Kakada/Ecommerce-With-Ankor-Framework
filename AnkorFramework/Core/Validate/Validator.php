<?php
namespace AnkorFramework\Core\Validate;

use AnkorFramework\Core\Validate\Rule\DateRule;
use AnkorFramework\Core\Validate\Rule\EmailRule;
use AnkorFramework\Core\Validate\Rule\IntegerRule;
use AnkorFramework\Core\Validate\Rule\MaxRule;
use AnkorFramework\Core\Validate\Rule\MinRule;
use AnkorFramework\Core\Validate\Rule\RequiredRule;
use AnkorFramework\Core\Validate\Rule\StringRule;
use AnkorFramework\Core\Validate\Rule\StrongPassword;

class Validator
{

    protected static $ruleMap = [
        'required' => RequiredRule::class,
        'string' => StringRule::class,
        'integer' => IntegerRule::class,
        'min' => MinRule::class,
        'max' => MaxRule::class,
        'email' => EmailRule::class,
        'date' => DateRule::class,
        'strong_password' => StrongPassword::class,
    ];

    public static function validate(array $data = [], array $rules = [])
    {
        foreach ($rules as $field => $ruleSet) {
            $rulesArray = explode('|', $ruleSet);
            foreach ($rulesArray as $rule) {
                $parts = explode(':', $rule, 2);
                $ruleName = $parts[0];
                $parameter = $parts[1] ?? null;

                if (isset(self::$ruleMap[$ruleName])) {
                    $ruleInstance = ($parameter !== null) ? new self::$ruleMap[$ruleName]($parameter) : new self::$ruleMap[$ruleName];

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