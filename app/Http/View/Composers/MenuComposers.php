<?php


namespace App\Http\View\Composers;
use App\Models\Menu;
use Illuminate\View\View;

class MenuComposers
{
    protected $users;


    public function __construct()
    {

    }

    public function compose(View $view)
    {
        $menus =  Menu::select('id', 'name', 'parent_id')->where('active', 1)->orderByDesc('id')->get();

        $view->with('menus', $menus);
    }
}
