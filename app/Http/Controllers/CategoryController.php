<?php

namespace App\Http\Controllers;

use App\Http\Repositories\CategoryRepository;
use App\Http\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;
    protected $categoryRepository;

    public function __construct(CategoryService $categoryService,
                                CategoryRepository $categoryRepository)
    {
        $this->categoryService = $categoryService;
        $this->categoryRepository = $categoryRepository;
    }

    public function getAll()
    {
        $categories = $this->categoryService->getAll();
        return view('category.list', compact('categories'));
    }

    public function showFormAdd()
    {
        return view('category.add');
    }

    public function addCategory(Request $request)
    {
        $this->categoryService->addCategory($request);
        return redirect()->route('categories.list');
    }

    public function showFormEdit($id)
    {
        $category = $this->categoryRepository->findById($id);
        return view('category.edit',compact('category'));
    }

    public function edit(Request $request, $id)
    {
        $this->categoryService->edit($request,$id);
        return redirect()->route('categories.list');
    }
}
