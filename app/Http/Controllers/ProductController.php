<?php

namespace App\Http\Controllers;

use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;

    public function __construct(ProductRepositoryInterface $productRepository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index(Request $request)
    {
        $products = [];
        if($request->has('name')) {
            $products = $this->productRepository->search($request->get('name'));
        }
        else {
            $products = $this->productRepository->getAll();
        }
        return view('product.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->getAll();
        return view('product.add',compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        try {
            $this->productRepository->create($data);
            return redirect()->back()->with('success', 'Add Product Success !');
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Add Product Error !');
        }
    }

    public function show($id)
    {
        $product = $this->productRepository->getListById($id);
        $categories = $this->categoryRepository->getAll();
        return view('product.show', compact('product','categories'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        try {
            $this->productRepository->update($id, $data);
            $this->productRepository->getListById($id);
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
            $this->productRepository->delete($id);
            return redirect()->route('product.index')->with('success', 'Delete Product Success !');
        } catch (\Exception $error) {
            return redirect()->route('product.index')->with('error', 'Delete Product Error !');
        }
    }

}
