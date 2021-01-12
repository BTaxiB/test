<?php

namespace App\Models;

class Users extends Model
{

    protected string $table = 'users';

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
     * Insert table row.
     */
    function create()
    {
        $sql = "INSERT INTO {$this->table} SET username = :username, password = :password, admin = :admin, product_id = :product_id";

        $prep_state = $this->getDB()->prepare($sql);

        $prep_state->bindParam(':username', $this->username);
        $prep_state->bindParam(':password', $this->password);
        $prep_state->bindParam(':admin', $this->admin);

        if (!$prep_state->execute()) {
            return false;
        }

        return $prep_state;
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

        $data['username'] = $row['username'];
        $data['password'] = $row['password'];
        $data['admin']    = $row['admin'];

        return $data;
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

    /**
     * Checks if user has the admin status.
     * 
     * @return bool
     * Return TRUE|FALSE depending on query success.
     */

    function isAdmin(int $id): bool
    {
        $sql = "SELECT status FROM {$this->table} WHERE id = :id LIMIT 1";

        $prep_state = $this->getDB()->prepare($sql);

        $prep_state->bindParam(':id', $id);

        return $prep_state->execute() ? true : false;
    }
}
