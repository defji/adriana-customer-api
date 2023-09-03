<?php


namespace App\Database;

use Illuminate\Database\MySqlConnection;

class LimitedConnection extends MySqlConnection
{

    public function __construct($connection, $maxConnections)
    {
        parent::__construct($connection->getPdo(), $connection->getDatabaseName(), $connection->getTablePrefix(),
            $connection->getConfig());

        $this->maxConnections = config('database.connection_limit');
    }

    public function getPdo()
    {
        if ($this->activeConnectionCount() >= $this->maxConnections) {
            throw new \Exception('Maximum connection limit reached.');
        }

        return parent::getPdo();
    }

}
