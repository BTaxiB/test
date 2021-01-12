<?php

namespace App\Controllers;

use App\Models\Product;
use App\Traits\Sanitation;

class ProductController
{
    use Sanitation;

    /**
     * Store products in database.
     * 
     * @return void
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
     * Get all products.
     */
    function index()
    {
        $product = new Product();
        $state = $product->getAll();

        return $state;
    }

    /**
     * Get product with matching id.
     */
    function show(int $id): array
    {
        $product = new Product();
        $data = $product->edit($id);

        return $data;
    }

    /**
     * Update products data.
     * 
     * @return void
     */
    function update(array $data): void
    {
        $product = new Product();

        $result = $this->show($data['id']);

        $product->title       = isset($data['title']) ? Sanitation::validInput($data['title']) : $result['title'];
        $product->description = isset($data['description']) ? Sanitation::validInput($data['description']) : $result['description'];
        $product->image       = isset($data['image']) ? $data['image'] : $result['image'];

        if (isset($data['image'])) {
            $product->image_tmp = $data['image_tmp'];
        }

        $product->id = $data['id'];

        $product->update();
    }

    /**
     * Delete product from database.
     */
    function delete(int $id): void
    {
        $product = new Product();
        $product->delete($id);
    }
}
