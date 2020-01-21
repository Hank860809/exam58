<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Menu extends Model
{
    protected $table      = 'menus';
    protected $primaryKey = 'id';

    public static function GetMenu() {
        $userid = Auth::guard()->user()->id;
        $user_menus = DB::table('menus')
            ->join('role_has_menus','menus.id','=','role_has_menus.menu_id')
            ->join('roles', 'role_has_menus.role_id', '=', 'roles.id')
            ->join('model_has_roles', 'model_has_roles.role_id', '=', 'roles.id')
            ->join('users', 'model_has_roles.model_id', '=', 'users.id')
            ->where('users.id','=',$userid)
            ->select('menus.name','menus.icon','menus.url')
            ->get();
        // $users = DB::table('menus');
        // dd($count);

        return view('vendor.backpack.base.inc.sidebar_content', compact('user_menus'));
    }
}
