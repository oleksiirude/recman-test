<?php

namespace Recman\Database;

use PDO;

class Database
{
    /**
     * @var PDO
     */
    private PDO $connection;

    /**
     * @param PDO $connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param string $query
     * @param array $bindings
     * @return array
     */
    public function select(string $query, array $bindings): array
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($bindings);

        return $statement->fetchAll() ?? [];

    }

    /**
     * @param string $query
     * @param array $bindings
     */
    public function insert(string $query, array $bindings): void
    {
        $sth = $this->connection->prepare($query);

        $sth->execute($bindings);
    }
}