<?php

namespace Recman\Services;

use Recman\Database\Database;
use Recman\Database\MysqlConnection;
use Recman\Enums\AuthStatusEnum;

class UserService
{
    /**
     * @var Database
     */
    private Database $database;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->database = new Database(new MysqlConnection());
    }

    /**
     * @param string $email
     * @return array|null
     */
    public function getUser(string $email): ?array
    {
        $query = "SELECT * FROM users WHERE email = :email";

        $result = $this->database->select($query, [':email' => $email]);

        return $result[0] ?? null;
    }

    /**
     * @param string $email
     * @return bool
     */
    public function userExists(string $email): bool
    {
        return (bool)$this->getUser($email);
    }

    /**
     * @param array $params
     */
    public function createUser(array $params): void
    {
        $bindings = [
            ':first_name' => $params['first_name'],
            ':last_name'  => $params['last_name'],
            ':email'      => $params['email'],
            ':phone'      => $params['phone'],
            ':password'   => password_hash($params['password'], PASSWORD_DEFAULT),
        ];

        $query = "INSERT INTO users(first_name, last_name, email, phone, password) VALUES (:first_name, :last_name, :email, :phone, :password)";

        $this->database->insert($query, $bindings);
    }

    /**
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function checkCredentials(string $email, string $password): bool
    {
        $user = $this->getUser($email);

        if (!$user) {
            return false;
        }

       return password_verify($password, $user['password']);
    }

    /**
     * @return void
     */
    public function signIn(): void
    {
        $_SESSION[AuthStatusEnum::AUTHENTICATED] = true;
    }

    /**
     * @return void
     */
    public function signOut(): void
    {
        unset($_SESSION[AuthStatusEnum::AUTHENTICATED]);
    }
}