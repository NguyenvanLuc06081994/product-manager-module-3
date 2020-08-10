<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Repositories\CategoryRepository;
use App\Http\Services\CategoryService;
use App\Http\Services\ProductService;
use App\Http\Services\StoreService;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;
    protected $categoryService;
    protected $storeService;

    public function __construct(ProductService $productService,
                                CategoryService $categoryService,
                                StoreService  $storeService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
        $this->storeService= $storeService;
    }

    public function getAll()
    {
        $products = $this->productService->getAll();
        $categories = $this->categoryService->all();
        return view('product.list',compact('products','categories'));
    }

    public function showFormAdd()
    {
        $stores = $this->storeService->getAll();
        $categories = $this->categoryService->all();
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
        $categories = $this->categoryService->all();
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


    public function search(Request $request)

    {
        $keyword = $request->input('keyword');
        if (!$keyword) {
            return redirect()->route('products.list');
        }
        $products = Product::where('name', 'LIKE', '%' . $keyword . '%')
            ->paginate(5);

        $categories = $this->categoryService->all();
        return view('product.list', compact('products', 'categories'));
    }


    public function findByCategory(Request $request)
    {
        $idCategory = $request->category_id;
//        $categoryFilter = Category::findOrFail($idCategory);
        $products = Product::where('category_id',$idCategory)->paginate(5);
        $categories = $this->categoryService->all();
//        $totalProduct = count($products);
        return view('product.list',compact('products','categories'));

    }

}
