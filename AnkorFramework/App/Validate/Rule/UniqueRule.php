<?php
namespace AnkorFramework\App\Validate\Rule;

use AnkorFramework\App\Database\Core\Database;
use AnkorFramework\App\Validate\RuleInterface;

class UniqueRule implements RuleInterface
{
    private $table;
    private $column;

    public function __construct($parameter)
    {
        // Parse the parameter which should be in format "table,column"
        $parts = explode(',', $parameter);
        $this->table = $parts[0];
        $this->column = $parts[1] ?? 'email';
    }

    public function passes($value)
    {
        // Skip validation if value is null or empty
        if ($value === null || $value === '') {
            return true;
        }

        // Create database connection
        $database = new Database();

        // Check if the value exists in the specified table and column
        $result = $database
            ->query(
                "SELECT COUNT(*) as count FROM {$this->table} WHERE {$this->column} = :value",
                ['value' => $value]
            )
            ->find();

        // If count is 0, the value is unique
        return $result['count'] == 0;
    }

    public function message($attribute)
    {
        return "$attribute is already in use.";
    }
}