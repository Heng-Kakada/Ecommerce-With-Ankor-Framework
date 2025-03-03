<?php
namespace AnkorFramework\App\Validate\Rule;

use AnkorFramework\App\Validate\RuleInterface;

class StrongPassword implements RuleInterface
{


    public function passes($value)
    {

        $password = $value ?? '';

        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';

        if (!preg_match($pattern, $password)) {
            return false;
        }

        $commonPasswords = ['password', '123456', 'qwerty', 'letmein', 'welcome', 'admin', 'iloveyou'];

        return !in_array(strtolower($password), $commonPasswords);

    }

    public function message($attribute)
    {
        return "$attribute must be a strong password at least 8 characters long, include uppercase, lowercase, number, and special character.";
    }
}