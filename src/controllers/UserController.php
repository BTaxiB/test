<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Comment;
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
            $user->username    = Sanitation::validInput($data['username']);
            $user->password    = Sanitation::validInput($data['password']);
            $user->admin       = $data['admin'];

            $user->create();
        } catch (\Throwable $th) {
            throw 'Something went wrong with insertion. Check your data.';
        }
    }

    /**
     * 
     */
    // function index()
    // {
    //     $user = new User();
    //     $data = $user->getAll();

    //     return $data;
    // }

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
    function grantAdmin(int $id)
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
    function checkStatus(int $id)
    {
        $user = new User();

        $result = $this->show($id);

        if (!isset($result['id'])) {
            return false;
        }

        return $user->isAdmin($result['id']);
    }

    /**
     * 
     */
    function approveComment(int $id)
    {
        $comment = new Comment();
        $result = $this->show($id);

        if (!isset($result['id'])) {
            return false;
        }

        $comment->id = $result['id'];
        $comment->approve();
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
