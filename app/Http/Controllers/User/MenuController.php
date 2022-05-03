<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Services\Menu\MenuService;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index(Request $request, $id, $slug) {
        $menu = $this->menuService->getId($id);

        $products = $this->menuService->getProduct($menu, $request);

        return view('user.menu', [
            'title' => $menu->name,
            'products' => $products,
            'menu' => $menu
        ]);
    }

}
