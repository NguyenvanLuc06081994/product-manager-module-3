<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CategoryRepository;
use App\Http\Services\ProductService;
use App\Http\Services\StoreService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;
    protected $categoryRepository;
    protected $storeService;

    public function __construct(ProductService $productService,
                                CategoryRepository $categoryRepository,
                                StoreService  $storeService)
    {
        $this->productService = $productService;
        $this->categoryRepository = $categoryRepository;
        $this->storeService= $storeService;
    }

    public function getAll()
    {
        $products = $this->productService->getAll();
        return view('product.list',compact('products'));
    }

    public function showFormAdd()
    {
        $stores = $this->storeService->getAll();
        $categories = $this->categoryRepository->getAll();
        return view('product.add',compact('categories','stores'));
    }

    public function addProduct(Request $request)
    {
        $this->productService->addProduct($request);
        return redirect()->route('products.list');
    }

    public function showFormEdit($id)
    {
        $stores = $this->storeService->getAll();
        $product = $this->productService->findById($id);
        $categories = $this->categoryRepository->getAll();
        return view('product.edit',compact('product','categories','stores'));
    }

    public function edit(Request $request,$id)
    {
        $this->productService->edit($request,$id);
        return redirect()->route('products.list');
    }

    public function delete($id)
    {
        $this->productService->delete($id);
        return redirect()->route('products.list');
    }
}
