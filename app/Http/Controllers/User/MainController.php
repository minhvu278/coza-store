<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Product\ProductService;
use App\Http\Services\Slider\SliderService;
use Illuminate\Http\Request;

class MainController extends Controller
{

    protected $product;
    protected $slider;
    protected $menu;

    public function __construct(SliderService $slider, MenuService $menu, ProductService $product)
    {
        $this->slider = $slider;
        $this->menu = $menu;
        $this->product = $product;
    }

    public function index() {
        return view('user.main', [
            'title' => 'SHOP',
            'sliders' => $this->slider->show(),
            'menus' => $this->menu->show(),
            'products' => $this->product->get()
        ]);
    }

    public function loadProduct(Request $request) {
        $page = $request->input('page', 0);

        $result = $this->product->get($page);

        if (count($result) != 0) {
            $html = view('user.products.list', ['products' => $result])->render();

            return response()->json([
               'html' => $html
            ]);
        }
        return response()->json(['html' => '']);
    }
}
