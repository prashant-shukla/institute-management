<?php

namespace App\Filament\Installation;

use Exception;
use Illuminate\Database\Connectors\ConnectionFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DatabaseConnectionCheck
{
  protected $connection;

  public function __construct($dbConnectionInfo)
  {
    try {
      $dbConnectionInfo['driver'] = 'mysql';
      $dbConnectionInfo['database'] = $dbConnectionInfo['name'];
      $this->connection = new \PDO(
        "{$dbConnectionInfo['driver']}:host={$dbConnectionInfo['host']};port={$dbConnectionInfo['port']};dbname={$dbConnectionInfo['database']}",
        $dbConnectionInfo['username'],
        $dbConnectionInfo['password']
      );
      $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    } catch (\Throwable $e) {
      Log::error("Database connection error: " . $e->getMessage());
      $this->connection = null;
    }
  }

  public function check($databaseConnectionInfo)
  {
    if ($this->connection === null) {
      return [
        'success' => false,
        'message' => 'Unable to establish database connection',
      ];
    }
    try {
      $stmt = $this->connection->prepare('SELECT 1');
      $stmt->execute();
      return ['success' => true];
    } catch (\Throwable $e) {
      return [
        'success' => false,
        'message' => 'Database query error: ' . $e->getMessage(),
      ];
    }
  }
}
