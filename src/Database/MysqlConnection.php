<?php

namespace Recman\Database;

use PDO;
use PDOException;

class MysqlConnection extends PDO
{
    /**
     * Class constructor.
     */
    public function __construct() {
        $config = config('database');

        $dsn = "mysql:dbname={$config['db_name']};host={$config['host']}";

        try {
            parent::__construct($dsn, $config['username'], $config['password'],
                [
                    PDO::ATTR_EMULATE_PREPARES   => false,
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        } catch (PDOException $exception) {
            throw new PDOException();
        }
    }
}