<?php


namespace App\Database;

use Illuminate\Database\MySqlConnection;

class LimitedConnection extends MySqlConnection
{
    protected $maxConnections;

    public function __construct($connection, $maxConnections)
    {
        parent::__construct($connection->getPdo(), $connection->getDatabaseName(), $connection->getTablePrefix(),
            $connection->getConfig());

        $this->maxConnections = $maxConnections;
    }

    public function getPdo()
    {
        if ($this->activeConnectionCount() >= $this->maxConnections) {
            throw new \Exception('Maximum connection limit reached.');
        }

        return parent::getPdo();
    }

    protected function activeConnectionCount()
    {
        // Ellenőrizzük a jelenleg aktív kapcsolatok számát
        // Ezt saját logika szerint kell implementálni
        // Például: return count($this->connections);
    }
}
