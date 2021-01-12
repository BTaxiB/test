<?php

namespace App\Models;

class Comment extends Model
{

    protected string $table = 'comments';

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Get data from table.
     */
    function getAll()
    {
        $sql = "SELECT * FROM {$this->table}";

        $prep_state = $this->getDB()->prepare($sql);

        return $prep_state->execute() ? $prep_state : false;
    }

    /**
     * Get data from table where product_id is not set.
     */
    function get()
    {
        $sql = "SELECT * FROM {$this->table} WHERE product_id IS NULL";

        $prep_state = $this->getDB()->prepare($sql);

        return $prep_state->execute() ? $prep_state : false;
    }

    /**
     * Get data from table where status is set to 0.
     */
    function getUnapproved()
    {
        $sql = "SELECT * FROM {$this->table} WHERE status = 0";

        $prep_state = $this->getDB()->prepare($sql);

        return $prep_state->execute() ? $prep_state : false;
    }

    /**
     * Get data from table with matching id.
     */
    function getMatch(int $id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE product_id = :product_id";

        $prep_state = $this->getDB()->prepare($sql);

        $prep_state->bindParam(':product_id', $id);

        return $prep_state->execute() ? $prep_state : false;
    }

    /**
     * Insert table row.
     */
    function create()
    {
        $sql = "INSERT INTO {$this->table} SET name = :name, email = :email, content = :content, product_id = :product_id";

        $prep_state = $this->getDB()->prepare($sql);

        $prep_state->bindParam(':name', $this->name);
        $prep_state->bindParam(':email', $this->email);
        $prep_state->bindParam(':content', $this->content);
        $prep_state->bindParam(':product_id', $this->product_id);

        if (!$prep_state->execute()) {
            return false;
        }

        return true;
    }

    /**
     * Show table row with matching id.
     * 
     * @return array
     */
    function edit(int $id): array
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id LIMIT 1";

        $prep_state = $this->getDB()->prepare($sql);

        $prep_state->bindParam(':id', $id);

        $prep_state->execute();

        $row = $prep_state->fetch(\PDO::FETCH_ASSOC);

        $data = [];

        $data['name']       = $row['name'];
        $data['email']      = $row['email'];
        $data['content']    = $row['content'];
        $data['product_id'] = $row['product_id'];

        return $data;
    }

    /**
     * Update table row column status with matching id to 1.
     * 
     * @return void
     */
    function approve(): void
    {
        $sql = "UPDATE {$this->table} SET status = 1 WHERE id = :id";

        $prep_state = $this->getDB()->prepare($sql);

        $prep_state->bindParam(':id', $this->id);

        $prep_state->execute();
    }


    /**
     * Delete table row with matching id.
     * 
     * @return bool
     * Returns TRUE|FALSE depending on query success.
     */
    function delete(int $id): bool
    {
        $sql = "DELETE FROM {$this->table} WHERE id = :id";

        $prep_state = $this->getDB()->prepare($sql);

        $prep_state->bindParam(':id', $id);

        return $prep_state->execute() ? true : false;
    }
}
