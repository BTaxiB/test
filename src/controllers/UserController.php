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

            return true;
        } catch (\Throwable $th) {
            echo 'Something went wrong with insertion. Check your data.';
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
        $user->checkUser();

        //double checking
        if (Sanitation::match($user->username, $data['username'])) {
            if (Sanitation::match($user->password, $data['password'])) {
                return $user->id;
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
    // function grantAdmin(int $id)
    // {
    //     $user = new User();

    //     $result = $this->show($id);

    //     if (!isset($result['id'])) {
    //         return false;
    //     }

    //     $user->id = $result['id'];
    //     $user->setAdmin();
    // }

    /**
     * Check if user is admin.
     */
    // function checkStatus(int $id)
    // {
    //     $user = new User();

    //     $result = $this->show($id);

    //     if (!isset($result['id'])) {
    //         return false;
    //     }

    //     return $user->isAdmin($result['id']);
    // }

    /**
     * Approve comment for publishing.
     */
    function approveComment(int $id)
    {
        $comment = new Comment();
        $comment->edit($id);

        if (!isset($comment)) {
            return false;
        }

        $comment->id = $id;

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
