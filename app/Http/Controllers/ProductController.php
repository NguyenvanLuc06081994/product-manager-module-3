<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CategoryRepository;
use App\Http\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;
    protected $categoryRepository;

    public function __construct(ProductService $productService,
                                CategoryRepository $categoryRepository)
    {
        $this->productService = $productService;
        $this->categoryRepository = $categoryRepository;
    }

    public function getAll()
    {
        $products = $this->productService->getAll();
        return view('product.list',compact('products'));
    }

    public function showFormAdd()
    {
        $categories = $this->categoryRepository->getAll();
        return view('product.add',compact('categories'));
    }

    public function addProduct(Request $request)
    {
        $this->productService->addProduct($request);
        return redirect()->route('products.list');
    }
}
