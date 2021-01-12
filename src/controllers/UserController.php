<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Comment;
use App\Traits\Sanitation;

class UserController
{
    use Sanitation;

    /**
     * Register user account into database.
     * 
     * @return string
     */
    function register(array $data): string
    {
        try {
            $user = new User();
            $user->username    = Sanitation::validInput($data['username']);
            $user->password    = Sanitation::validInput($data['password']);

            $user->create();

            return "Success";
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
     * Get user with matching id from database.
     */
    function show(int $id): array
    {
        $user = new User();
        $data = $user->edit($id);

        return $data;
    }

    /**
     * Grant admin privileges to user.
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
     * Check if user is admin.
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
     * Approve comment for publishing.
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
     * Remove user from database.
     * 
     * @return void
     */
    function delete(int $id): void
    {
        $user = new User();
        $user->delete($id);
    }
}
