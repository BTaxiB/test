<?php

namespace App\Controllers;

use App\Models\Product;
use App\Traits\Sanitation;

class ProductController
{
    use Sanitation;

    /**
     * 
     */
    function store(array $data): void
    {
        try {
            $product = new Product();
            $product->title       = Sanitation::validInput($data['title']);
            $product->description = Sanitation::validInput($data['description']);
            $product->image       = $data['image'];
            $product->image_tmp   = $data['image_tmp'];

            $product->create();
        } catch (\Throwable $th) {
            throw 'Something went wrong with insertion. Check your data.';
        }
    }

    /**
     * 
     */
    function index()
    {
        $product = new Product();
        $data = $product->getAll();

        return $data;
    }

    /**
     * 
     */
    function show(int $id): array
    {
        $product = new Product();
        $data = $product->edit($id);

        return $data;
    }

    /**
     * 
     */
    function update(array $data): void
    {
        $product = new Product();
        $product->title       = Sanitation::validInput($data['title']);
        $product->description = Sanitation::validInput($data['description']);
        $product->image       = $data['image'];
        $product->image_tmp   = $data['image_tmp'];

        $product->update($data['id']);
    }

    /**
     * 
     */
    function delete(int $id): void
    {
        $product = new Product();
        $product->delete($id);
    }
}
