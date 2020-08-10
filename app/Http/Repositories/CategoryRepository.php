<?php


namespace App\Http\Repositories;


use App\Category;

class CategoryRepository
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function all()
    {
        return $this->category->all();
    }

    public function getAll()
    {
        return $this->category->orderBy('id','DESC')->paginate(2);
    }

    public function save($category)
    {
        $category->save();
    }

    public function findById($id)
    {
        return $this->category->findOrFail($id);
    }
}
