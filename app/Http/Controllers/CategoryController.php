<?php

namespace App\Http\Controllers;

use App\Models\Category;
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

    public function index(Request $request)
    {
        $categories = [];
        if($request->has('name')) {
            $categories = $this->categoryRepository->search($request->get('name'));
        }
        else {
            $categories = $this->categoryRepository->getAll();
        }

        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.add');
    }

    public function store(Request $request)
    {
        $data = $request->all();
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

    public function update(Request $request, $id)
    {
        $data = $request->all();
        try {
            $this->categoryRepository->update($id, $data);
            $this->categoryRepository->getListById($id);
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
            $this->categoryRepository->delete($id);
            return redirect()->route('category.index')->with('success', 'Delete Category Success !');
        } catch (\Exception $error) {
            return redirect()->route('category.index')->with('error', 'Delete Category Error !');
        }
    }
}
