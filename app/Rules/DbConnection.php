<?php

namespace App\Rules;

use App\Filament\Installation\DatabaseConnectionCheck;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\DataAwareRule;
// use Shipu\WebInstaller\Utilities\DatabaseConnectionCheck;
use Illuminate\Support\Facades\Log;

class DbConnection implements ValidationRule, DataAwareRule
{
    protected array $data = [];

    public function setData(array $data): static
    {
        $this->data = $data;
        return $this;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        try {
            $request = $this->data['data'] ?? [];
            $environment = $request['environments'] ?? [];
            $dbEnvironment = $environment['database'] ?? [];
            if (empty($dbEnvironment)) {
                Log::error('DB connection environment error: ');
                $fail('No environment data provided.');
            }
            $databaseConnection = new DatabaseConnectionCheck($dbEnvironment);
            $connection = $databaseConnection->check($dbEnvironment);
            if ($connection['success']) {
                Log::info('DB connection success using installer environment ');
            } else {
                Log::info('Error During DB connection using installer environment ');
                $fail($connection['message']);
            }
        } catch (\Throwable $th) {
            Log::error('Database connection validation error: ' . $th->getMessage());
            $fail('An unexpected error occurred while validating the database connection.');
        }
    }
}
