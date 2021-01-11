<?php

namespace App\Models;

class Product extends Model
{

    protected string $table = 'products';

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
        $sql = "INSERT INTO {$this->table} SET title = :title, image = :image, description = :description";

        $prep_state = $this->getDB()->prepare($sql);

        $prep_state->bindParam(':title', $this->title);
        $prep_state->bindParam(':image', $this->image);
        $prep_state->bindParam(':description', $this->description);

        if (!$prep_state->execute()) {
            return false;
        }

        //upload file

        return $prep_state;
    }

    /**
     * Show table row with matching id.
     * 
     * @return void
     */
    function edit(int $id): void
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";

        $prep_state = $this->getDB()->prepare($sql);

        $prep_state->bindParam(':id', $id);

        $row = $prep_state->fetch();

        $this->title       = $row['title'];
        $this->image       = $row['image'];
        $this->description = $row['description'];
    }

    /**
     * Update table row with matching id.
     * 
     * @return void
     */
    function update(): void
    {
        $sql = "UPDATE {$this->table} SET title = :title, image = :image, description = :description WHERE id = :id";

        $prep_state = $this->getDB()->prepare($sql);

        $prep_state->bindParam(':title', $this->title);
        $prep_state->bindParam(':image', $this->image);
        $prep_state->bindParam(':description', $this->description);
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
