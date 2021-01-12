<?php

namespace App\Controllers;

use App\Models\User;
use App\Traits\Sanitation;

class UserController
{
    use Sanitation;

    /**
     * 
     */
    function store(array $data): void
    {
        try {
            $user = new User();
            $user->title       = Sanitation::validInput($data['title']);
            $user->description = Sanitation::validInput($data['description']);
            $user->image       = $data['image'];
            $user->image_tmp   = $data['image_tmp'];

            $user->create();
        } catch (\Throwable $th) {
            throw 'Something went wrong with insertion. Check your data.';
        }
    }

    /**
     * 
     */
    function index()
    {
        $user = new User();
        $data = $user->getAll();

        return $data;
    }

    /**
     * 
     */
    function show(int $id): array
    {
        $user = new User();
        $data = $user->edit($id);

        return $data;
    }

    /**
     * 
     */
    function update(int $id)
    {
        $user = new User();

        $result = $this->show($id);

        if (!isset($result['id'])) {
            return false;
        }

        $user->id = $result['id'];
        $user->setAdmin();
    }


    /**
     * 
     */
    function delete(int $id): void
    {
        $user = new User();
        $user->delete($id);
    }
}
