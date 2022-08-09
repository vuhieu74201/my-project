<?php

namespace App\Services;

use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAll(Request $request)
    {
        if ($request->has('name')) {
            $categories = $this->categoryRepository->search($request->get('name'));
        } else {
            $categories = $this->categoryRepository->getAll();

        }
        foreach ($categories as $category) {
            $category->quantity = 0;
            foreach ($category->products as $product) {
                $category->quantity += $product->quantity;
            }
        }
        return $categories ;

    }

    public function getListById($id)
    {
        return $this->categoryRepository->getListById($id);
    }

    public function update(Request $request, $id)
    {
    }

    public function delete($id)
    {
        return $this->categoryRepository->delete($id);
    }


}
