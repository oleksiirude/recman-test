<?php

namespace Recman\Validator;

class Validator
{
    /**
     * @param array $params
     * @param array $fields
     * @return bool
     */
    public static function validate(array $params, array $fields): bool
    {
        foreach ($fields as $field) {
            $value = $params[$field] ?? '';
            switch ($field) {
                case 'email':
                    $result = self::validateEmail($value);
                    break;
                case 'phone':
                    $result = self::validatePhone($value);
                    break;
                case 'password':
                    $result = self::validateTextInput($value, 8, 30);
                    break;
                default: {
                    $result = self::validateTextInput($value);
                }
            }

            if (!$result) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param string $email
     * @param int $min
     * @param int $max
     * @return bool
     */
    public static function validateEmail(string $email, int $min = 6, int $max = 30): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL)
            && strlen($email) >= $min
            && strlen($email) <= $max;
    }

    /**
     * @param string $phone
     * @param int $min
     * @param int $max
     * @return bool
     */
    public static function validatePhone(string $phone, int $min = 8, int $max = 12): bool
    {
        return is_numeric($phone)
            && strlen($phone) >= $min
            && strlen($phone) <= $max;
    }

    /**
     * @param string $input
     * @param int $min
     * @param int $max
     * @return bool
     */
    public static function validateTextInput(string $input, int $min = 1, int $max = 255): bool
    {
        return strlen($input) >= $min && strlen($input) <= $max;
    }
}