<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    protected $categoryService;
    protected $productService;

    public function __construct(
        CategoryService $categoryService,
        ProductService $productService
    ) {
        $this->categoryService = $categoryService;
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        $products = $this->productService->getAll($request);
        return view('product.index', compact('products'));
    }

    public function create(Request $request)
    {
        $categories = $this->categoryService->getAll($request);
        return view('product.add', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $this->productService->create($request);
            return redirect()->back()->with('success', 'Add Product Success !');
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Add Product Error !');
        }
    }

    public function show(Request $request ,$id)
    {
        $product = $this->productService->getListById($id);
        $categories = $this->categoryService->getAll($request);
        return view('product.show', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->productService->update($request, $id);
            $this->productService->getListById($id);
            Session::flash('success', 'Update Product Success !');
            return redirect()->back();
        } catch (\Exception $error) {
            Session::flash('error', 'Update Product Error !');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        try {
            $this->productService->delete($id);
            return redirect()->route('product.index')->with('success', 'Delete Product Success !');
        } catch (\Exception $error) {
            return redirect()->route('product.index')->with('error', 'Delete Product Error !');
        }
    }

}
