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
    function register(array $data): void
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
     * Checking users credentials.
     * 
     * @return mixed
     * Returns user_id|false depending on success.
     */
    function login(array $data)
    {
        $user = new User();
        $user->username = $data['username'];
        $user->password = $data['password'];
        $state = $user->checkUser();

        $row = $state->fetch();

        //double checking
        if (Sanitation::match($row['username'], $data['username'])) {
            if (Sanitation::match($row['password'], $data['password'])) {
                return $row['id'];
            }
        } else {
            return false;
        }
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
