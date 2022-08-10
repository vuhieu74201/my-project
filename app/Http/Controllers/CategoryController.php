<?php

namespace App\Http\Controllers;

use App\Repositories\Category\CategoryRepositoryInterface;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    protected $categoryRepository;
    protected $categoryService;
    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        CategoryService $categoryService
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->categoryService = $categoryService;
    }

    public function index(Request $request)
    {
        $categories = $this->categoryService->getAll($request);
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.add');
    }

    public function store(Request $request)
    {
        try {
            $this->categoryService->create($request);
            return redirect()->route('category.store')->with('success', 'Add Category Success !');
        } catch (\Exception $error) {
            return redirect()->route('category.store')->with('error', 'Add Category Error !');
        }
    }

    public function show($id)
    {
        $category = $this->categoryService->getListById($id);
        return view('category.show', compact('category'));
    }

    public function edit($id)
    {
        $category = $this->categoryService->getListById($id);
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->categoryService->update($request, $id);
            $this->categoryService->getListById($id);
            Session::flash('success', 'Update Category Success !');
            return redirect()->back();
        } catch (\Exception $error) {
            Session::flash('error', 'Update Category Error !');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            $this->categoryService->delete($id);
            return redirect()->route('category.index')->with('success', 'Delete Category Success !');
        } catch (\Exception $error) {
            return redirect()->route('category.index')->with('error', 'Delete Category Error !');
        }
    }
}
