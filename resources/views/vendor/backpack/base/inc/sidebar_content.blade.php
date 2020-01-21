{{-- <!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
@can('後台管理')
<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
<li><a href="{{ backpack_url('elfinder') }}"><i class="fa fa-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>
<!-- Users, Roles Permissions -->
<li class="treeview">
  <a href="#"><i class="fa fa-group"></i> <span>使用者角色權限管理</span> <i class="fa fa-angle-left pull-right"></i></a>
  <ul class="treeview-menu">
    <li></li>
    <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/role') }}"><i class="fa fa-group"></i> <span>角色</span></a></li>
    <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/permission') }}"><i class="fa fa-key"></i> <span>權限</span></a></li>
    <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/user') }}"><i class="fa fa-key"></i> <span>使用者</span></a></li>
  </ul>
</li>
@endcan
@can('建立測驗')
<li class="treeview">
    <a href="#"><i class="fa fa-file-text-o"></i> <span>考試管理</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
      <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/create') }}"><i class="fa fa-file-text-o"></i> <span>建立測驗</span></a></li>
      <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/exam') }}"><i class="fa fa-file-text-o"></i> <span>測驗一覽</span></a></li>
    </ul>
  </li>
@endcan --}}

<?php

// use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Facades\Auth;
use App\Menu;

$menu = Menu::GetMenu()->getData();
// dd(get_class_methods($menu));
// dd($menu['user_menus'])
// $userid = Auth::guard()->user()->id;
// $user_menus = DB::table('menus')
//             ->join('role_has_menus','menus.id','=','role_has_menus.menu_id')
//             ->join('roles', 'role_has_menus.role_id', '=', 'roles.id')
//             ->join('model_has_roles', 'model_has_roles.role_id', '=', 'roles.id')
//             ->join('users', 'model_has_roles.model_id', '=', 'users.id')
//             ->where('users.id','=',$userid)
//             ->select('menus.name','menus.icon','menus.url')
//             ->get();
// $users = DB::table('menus');
// $count = count($user_menus) ;
// dd($count);
?>
@foreach($menu['user_menus'] as $meun)
    <li><a href="{{ $meun->url }}"><i class="fa {{ $meun->icon }}"></i> <span>{{$meun->name}}</span></a></li>
@endforeach

