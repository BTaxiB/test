<?php

namespace App\Controllers;

use App\Models\Product;
use App\Traits\Sanitation;

class ProductController extends Controller
{
    use Sanitation;


    /**
     * 
     */
    function store()
    {
        try {
            $product = new Product();
            $product->title       = Sanitation::validInput($_POST['title']);
            $product->description = Sanitation::validInput($_POST['description']);
            $product->image       = $_FILES['image']['name'];
            $product->image_tmp   = $_FILES['image']['tmp_name'];

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
    function show(int $id)
    {
        $product = new Product();
        $product->edit($id);

        return $product;
    }

    /**
     * 
     */
    function update(int $id)
    {
        $product = new Product();
        $product->title       = Sanitation::validInput($_POST['title']);
        $product->description = Sanitation::validInput($_POST['description']);
        $product->image       = $_FILES['image']['name'];
        $product->image_tmp   = $_FILES['image']['tmp_name'];

        $product->update($id);
    }

    /**
     * 
     */
    function delete(int $id)
    {
        $product = new Product();
        $product->delete($id);
    }
}
