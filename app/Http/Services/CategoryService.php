<?php


namespace App\Http\Services;


use App\Category;
use App\Http\Repositories\CategoryRepository;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAll()
    {
        return $this->categoryRepository->getAll();
    }

    public function addCategory($request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->vendor = $request->vendor;
        $this->categoryRepository->save($category);
    }

    public function findById($id)
    {
        return $this->categoryRepository->findById($id);
    }

    public function edit($request, $id)
    {
        $category = $this->categoryRepository->findById($id);
        $category->name = $request->name;
        $category->vendor = $request->vendor;
        $this->categoryRepository->save($category);
    }
}
