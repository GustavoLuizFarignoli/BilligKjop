<?php 
namespace BilligKjop\Model\Checkers;

class UserChecker
{
    const EMPTY_INPUTS = 1000;
    const INVALID_NAME = 1001;
    const INVALID_EMAIL = 1002;
    const VALID_INPUTS = 2000;

    public static function validatePostData(array $postData):bool {
        return self::areRequiredFieldsFilled(postData: $postData) && self::checkInputs(postData: $postData);
    }
    

    public static function areRequiredFieldsFilled(array $postData) : bool
    {
        $requiredFieldsFilled = isset($postData["nome"]) && isset($postData["email"]);
        return $requiredFieldsFilled;
    }

    public static function checkInputs(array $postData): int
    {
        $isNameValid = self::checkName($postData["nome"]);
        $isPriceValid = self::checkEmail($postData["email"]);
        return $isNameValid && $isPriceValid;
    }

    public static function checkName(string $name):bool {
        $pattern = "/^(?=.*[A-Za-zÀ-ÿ])[A-Za-z0-9 \'\-À-ÿ]{1,255}$/";
        $result = preg_match(pattern: $pattern, subject: $name);
        return $result;
    }

    public static function checkEmail(string $email):bool {
        $email = filter_var(value: $email, filter: FILTER_SANITIZE_EMAIL);
        $pattern = "/^[A-z0-9]?.*$/";
        $result = preg_match(pattern: $pattern, subject: $email);
        return $result;
    }
}
