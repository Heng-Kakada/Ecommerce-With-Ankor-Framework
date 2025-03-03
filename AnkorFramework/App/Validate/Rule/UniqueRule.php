<?php
namespace AnkorFramework\App\Validate\Rule;

use AnkorFramework\App\Database\Core\Database;
use AnkorFramework\App\Validate\RuleInterface;

class UniqueRule implements RuleInterface
{
    private $table;
    private $column;
    private $ignoreId; // ID of current record being updated

    public function __construct($parameter)
    {
        $parts = explode(',', $parameter);
        $this->table = $parts[0];
        $this->column = $parts[1] ?? 'email';
        $this->ignoreId = $parts[2] ?? null; // Optional ID to ignore in uniqueness check
    }

    public function passes($value)
    {
        if ($value === null || $value === '') {
            return true;
        }

        $database = new Database();
        
        // If ignoreId is provided, exclude current record from uniqueness check
        $query = $this->ignoreId 
            ? "SELECT COUNT(*) as count FROM {$this->table} WHERE {$this->column} = :value AND id != :id" 
            : "SELECT COUNT(*) as count FROM {$this->table} WHERE {$this->column} = :value";

        $params = $this->ignoreId 
            ? ['value' => $value, 'id' => $this->ignoreId] 
            : ['value' => $value];

        $result = $database->query($query, $params)->find();

        return $result['count'] == 0;
    }


    public function message($attribute)
    {
        return "$attribute is already in use.";
    }
}