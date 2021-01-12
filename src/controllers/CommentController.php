<?php

namespace App\Controllers;

use App\Models\Comment;
use App\Traits\Sanitation;

class CommentController
{
    use Sanitation;

    /**
     * Store comments in database.
     * 
     * @return void
     */
    function store(array $data): void
    {
        try {
            $comment = new Comment();
            $comment->name       = Sanitation::validInput($data['name']);
            $comment->content    = Sanitation::validInput($data['content']);
            $comment->email      = $data['email'];
            $comment->product_id = $data['product_id'];

            $comment->create();
        } catch (\Throwable $th) {
            throw 'Something went wrong with insertion. Check your data.';
        }
    }

    /**
     * Get all comments.
     */
    function index()
    {
        $comment = new Comment();
        $state = $comment->getAll();

        return $state;
    }

    /**
     * Get company comments, where product id is not set.
     */
    function companyComments()
    {
        $comment = new Comment();
        $state = $comment->get();

        return $state;
    }

    /**
     * Get product comments, must match products id.
     */
    function productComments(int $id)
    {
        $comment = new Comment();
        $state = $comment->getMatch($id);

        return $state;
    }

    /**
     * 
     */
    function show(int $id): array
    {
        $comment = new Comment();
        $data = $comment->edit($id);

        return $data;
    }

    /**
     * Remove comment from database.
     */
    function delete(int $id)
    {
        $comment = new Comment();

        return $comment->delete($id);
    }
}
