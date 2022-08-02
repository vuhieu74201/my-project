<?php

namespace App\Http\Controllers;

use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->getAllList();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.add');
    }

    public function store(Request $categories)
    {
        $data = $categories->all();
        try {
            $this->categoryRepository->create($data);
            return redirect()->route('category.store')->with('success', 'Add Category Success !');
        } catch (\Exception $error) {
            return redirect()->route('category.store')->with('error', 'Add Category Error !');
        }
    }

    public function show($id)
    {
        $category = $this->categoryRepository->getListById($id);
        return view('category.show', compact('category'));
    }

    public function edit($id)
    {
        $category = $this->categoryRepository->getListById($id);
        return view('category.edit', compact('category'));
    }

    public function update(Request $category, $id)
    {
        $data = $category->all();
        try {
            $this->categoryRepository->update($id, $data);
            $this->categoryRepository->getListById($id);
            return redirect()->route('category.index')->with('success', 'Update Category Success !');
        } catch (\Exception $error) {
            return redirect()->route('category.index')->with('error', 'Update Category Error !');
        }
    }

    public function destroy($id)
    {
        try {
            $this->categoryRepository->delete($id);
            return redirect()->route('category.index')->with('success', 'Delete Category Success !');
        } catch (\Exception $error) {
            return redirect()->route('category.index')->with('error', 'Delete Category Error !');
        }
    }
}
