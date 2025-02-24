<?php
namespace AnkorFramework\Core\Validate\Rule;

use AnkorFramework\Core\Validate\RuleInterface;

class StrongPassword implements RuleInterface
{


    public function passes($value)
    {

        $passwrod = $value ?? '';

        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';

        if (!preg_match($pattern, $passwrod)) {
            return false;
        }

        $commonPasswords = ['password', '123456', 'qwerty', 'letmein', 'welcome', 'admin', 'iloveyou'];

        return !in_array(strtolower($passwrod), $commonPasswords);

    }

    public function message($attribute)
    {
        return "$attribute must be a strong password at least 8 characters long, include uppercase, lowercase, number, and special character.";
    }
}