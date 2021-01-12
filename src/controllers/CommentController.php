<?php

namespace App\Controllers;

use App\Models\Comment;
use App\Traits\Sanitation;

class CommentController
{
    use Sanitation;

    /**
     * 
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
     * 
     */
    function index()
    {
        $comment = new Comment();
        $data = $comment->getAll();

        return $data;
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
     * 
     */
    function delete(int $id): void
    {
        $comment = new Comment();
        $comment->delete($id);
    }
}
