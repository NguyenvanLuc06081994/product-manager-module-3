<?php

namespace App\Http\Services;

use App\Category;
use App\Customer;
use App\Http\Repositories\ProductRepository;
use App\Product;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAll()
    {
        return $this->productRepository->getAll();
    }

    public function addProduct($request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');
            $product->img = $path;
        }
        $this->productRepository->save($product);
    }

    public function findById($id)
    {
        return $this->productRepository->findById($id);
    }

    public function edit($request, $id)
    {
        $product = $this->productRepository->findById($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->stores()->sync($request->store);
        if ($request->hasFile('image')) {
            $currentImg = $product->img;
            if ($currentImg) {
                Storage::delete('/public/' . $currentImg);
            }
            $image = $request->file('image');
            $path = $image->store('images','public');
            $product->img = $path;
        }
        $this->productRepository->save($product);
    }

    public function delete($id)
    {
        $product = $this->productRepository->findById($id);
        $this->productRepository->delete($product);
    }

}
