<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Services\Product\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index($id= '', $slug = '') {
        $product = $this->productService->show($id);
        $productMore = $this->productService->more($id);

        return view('user.products.content', [
           'title' => $product->name,
           'product' => $product,
            'products' => $productMore
        ]);
    }
}
