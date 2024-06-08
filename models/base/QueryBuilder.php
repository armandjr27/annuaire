<?php
namespace Models\Base;

class QueryBuilder
{
	private string $query = '';
	private string $main_table = '';
	
    protected function select(array|null $data = ['*']) : self
    {
        $this->query .= "SELECT " . implode(', ', $data);

        return $this;
    }
        
    protected function from(string $table) : self
    {
        $this->main_table = $table;

        $this->query .= " FROM {$this->main_table}";

        return $this;
    }

    protected function where(string $key, int|string $value) : self
    {
        $value = (preg_match("/^[\d]+$/", $value)) ? $value : "'{$value}'";
        
        $this->query .= " WHERE {$key} = {$value}";

        return $this;
    }

    protected function and(string $key, int|string $value) : self
    {
        $value = (preg_match("/^[\d]+$/", $value)) ? $value : "'{$value}'";
        
        $this->query .= " AND {$key} = {$value}";

        return $this;
    }

    protected function join(string $table, string $key) : self
    {
        $this->query .= " INNER JOIN {$table} ON {$this->main_table}.{$key} = {$table}.{$key}";

        return $this;
    }

    protected function insert(string $table, array $data) : self
    {
        // Exemple : INSERT INTO $table ($fields[0], …, $fields[n]) VALUES ($values[0], …, $values[n])

        $fields = array_keys($data);
        $values = array_values($data);
        $end    = count($data);

        for ($i = 0; $i < $end; $i++)
        {
           $values[$i] = (preg_match("/^(:0)[\d]+$|^[\w]+\(\)$/im", $values[$i])) ? $values[$i] : "'". $values[$i] . "'"; 
        }

        $this->query .= "INSERT INTO {$table} (" . implode(', ', $fields) . ") VALUES (" . implode(', ', $values) . ")";

        return $this;
    }

    protected function update(string $table, array $data) : self
    {
        // Exemple : UPDATE $table SET $fields[0] = $values[0], …, $fields[n] = $values[n]

        $fields          = array_keys($data);
        $values          = array_values($data);
        $end             = count($data);
        $fieldsAndValues = [];

        for ($i = 0; $i < $end; $i++)
        {
           $fieldsAndValues[$i] = (preg_match("/^(:0)[\d]+$|^[\w]+\(\)$/im", $values[$i])) ? "{$fields[$i]} = {$values[$i]}" : "{$fields[$i]} = '{$values[$i]}'";
        }

        $this->query .= "UPDATE {$table} SET " . implode(', ', $fieldsAndValues);

        return $this;
    }

    protected function delete(string $table) : self
    {
        $this->query .= "DELETE FROM {$table}";

        return $this;
    }
        
    protected function getQuery() : string
    {
        return $this->query;
    }

    protected function setQuery(string $query): void
    {
        $this->query = $query;
    }
}
