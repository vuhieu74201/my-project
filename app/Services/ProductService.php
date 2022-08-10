<?php

namespace App\Services;

use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductService
{
    protected $productRepository;
    protected $categoryRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        CategoryRepositoryInterface $categoryRepository
    ) {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function getAll(Request $request)
    {
        if ($request->has('name')) {
            $products = $this->productRepository->search($request->get('name'));
        } else {
            $products = $this->productRepository->getAll();
        }
        return $products;
    }

    public function getListById($id)
    {
        return $this->productRepository->getListById($id);
    }

    public function create(Request $request)
    {
        $data = [
            'category_id'=>$request->input('category_id') ,
            'name' =>$request->input('name') ,
            'price'=>$request->input('price'),
            'quantity'=>$request->input('quantity'),
            'description'=>$request->input('description'),
        ];
        return $this->productRepository->create($data);

    }

    public function update(Request $request, $id)
    {
        $data = [
            'category_id'=>$request->input('category_id') ,
            'name' =>$request->input('name') ,
            'price'=>$request->input('price'),
            'quantity'=>$request->input('quantity'),
            'description'=>$request->input('description'),
        ];
        return $this->productRepository->update($id,$data);
    }

    public function delete($id)
    {
        return  $this->productRepository->delete($id);
    }

}
