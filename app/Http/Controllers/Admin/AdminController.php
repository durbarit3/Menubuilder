<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Menu as AppMenu;
use Illuminate\Http\Request;
use Harimayco\Menu\Models\Menus;
use Harimayco\Menu\Models\MenuItems;
use Harimayco\Menu\Facades\Menu;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    

    // show home page
    
    public function index()
    {
        return view('admin.home.home');
    }

    // admin menu setting

    public function menuSetting()
    {
        $menuList = Menu::get(1);
        $public_menu = Menu::getByName('Public');
        return view('admin.setting.menu_setting',compact('menuList','public_menu'));
    }

    public function urlSetting()
    {
        return view('admin.setting.url_setting');
    }

    public function getUrlName($id)
    {
        return AppMenu::where('type',$id)->get();
    }
}
