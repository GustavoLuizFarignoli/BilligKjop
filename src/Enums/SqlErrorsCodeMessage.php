<?php
namespace BilligKjop\Enums;

class SqlErrorsCodeMessage {
    public const DUPLICATE_ENTRY = '23000';
    public const FOREIGN_KEY_VIOLATION = '23503';
    public const NOT_NULL_VIOLATION = '23502';
    public const CHECK_VIOLATION = '23514';
    public const DEADLOCK = '40001';
    
    public static function echoJsonErrorMessage(string $sqlErrorCode): string {
        header('Content-Type: application/json');
        switch ($sqlErrorCode) {
            case self::DUPLICATE_ENTRY:
                echo json_encode(['status' => false, 'message' =>'Email já cadastrado.']);
                break;
            case self::NOT_NULL_VIOLATION:
                echo json_encode(['status' => false, 'message' =>'Valor necessário não preenchido ou enviado, por favor tente novamente.']);
                break;
            default:
                echo json_encode(['status' => false, 'message' =>'Erro desconhecido']);
                break;
        }
        exit();
    }
}
