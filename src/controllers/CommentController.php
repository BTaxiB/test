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
            $comment->title       = Sanitation::validInput($data['title']);
            $comment->description = Sanitation::validInput($data['description']);
            $comment->image       = $data['image'];
            $comment->image_tmp   = $data['image_tmp'];

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
