<?php
namespace App\Services\Contracts;

use Illuminate\Http\Request;

interface IMenuService extends IBaseService {
    public function getListMenus();
    public function getMenuByID($menu_id);
    public function getMenuItemsByMenuID($menu_id);
    public function updateMenu(Request $request);
    public function deleteMenu(Request $request);
}

