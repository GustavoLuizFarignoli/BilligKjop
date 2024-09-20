<?php 
namespace BilligKjop\Model\Checkers;

class ProdutoChecker
{
    const EMPTY_INPUTS = 1000;
    const INVALID_NAME = 1001;
    const INVALID_PRICE = 1002;
    const VALID_INPUTS = 2000;

    public static function validatePostData(array $postData):bool {
        return self::areRequiredFieldsFilled(postData: $postData) && self::checkInputs(postData: $postData);
    }
    

    public static function areRequiredFieldsFilled(array $postData) : bool
    {
        $requiredFieldsFilled = isset($postData["nome"]) && isset($postData["preco"]) && isset($postData["descricao"]);
        return $requiredFieldsFilled;
    }

    public static function checkInputs(array $postData): int
    {
        $isNameValid = self::checkName(name: $postData["nome"]);
        $isPriceValid = self::checkPrice(price: $postData["preco"]);
        $isDescriptionValid = self::checkDescription(description: $postData['descricao']);
        return $isNameValid && $isPriceValid;

        /*if ($isNameValid && $isPriceValid) return self::VALID_INPUTS;
        if (!$isNameValid) return self::INVALID_NAME;
        if (!$isPriceValid) return self::INVALID_PRICE;*/
    }

    public static function checkName(string $name):bool {
        $pattern = "/^(?=.*[A-Za-zÀ-ÿ])[A-Za-z0-9 \'\-À-ÿ]{1,255}$/";
        $result = preg_match(pattern: $pattern, subject: $name);
        return $result;
    }

    public static function checkPrice(string $price):bool {
        $pattern = "/^(?=.{1,13}$)\d{1,10}((\.||\,)?)\d{1,2}?$/";
        // O preço deve conter apenas números. Caso tenha uma vírgula ou ponto,
        // deve conter entre 1 e 2 números após a vírgula ou ponto.
        // Também é validado se o valor está entre 1 - 1 bilhão ANTES da vírgula.
        $result = preg_match(pattern: $pattern, subject: $price);
        return $result;
    }

    public static function checkDescription(string $description):bool {
        $pattern = "/^[\w \'\,\.À-ÿ]{1,500}$/";
        $result = preg_match(pattern: $pattern, subject: $description);
        return $result;
    }
}
