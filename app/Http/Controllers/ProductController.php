<?php

namespace App\Http\Controllers;

use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
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
        return view('product.add');
    }

    public function store(Request $products)
    {
        $data = $products->all();
        try {
            $this->productRepository->create($data);
            return redirect()->back()->with('success', 'Add Product Success !');
        } catch (\Exception $error) {
            return redirect()->back()->with('error', 'Add Product Error !');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
