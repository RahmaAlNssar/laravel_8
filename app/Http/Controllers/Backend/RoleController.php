<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Exception;
use App\DataTables\RoleDataTable;
use App\Http\Requests\RoleRequest;

class RoleController extends Controller
{
//     function __construct()
// {
// $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
// $this->middleware('permission:role-create', ['only' => ['create','store']]);
// $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
// $this->middleware('permission:role-delete', ['only' => ['destroy']]);
// }
public function index(RoleDataTable $dataTable)
{
    try {
        return $dataTable->render('backend.roles.index');
    } catch (Exception $e) {
        return response()->json($e->getMessage(), 500);
    }
}
public function create()
{
    try {
$permission = Permission::get();
return view('backend.roles.form',compact('permission'));
} catch (Exception $e) {
    return response()->json($e->getMessage(), 500);
}
}
public function store(Request $request)
{
    $this->validate($request, [
        'name' => 'required',
        'permission' => 'required',
    ]);
    try{

$role = Role::create(['name' => $request->input('name')]);
$role->syncPermissions($request->input('permission'));

return response()->json(['message' =>__('messages.save'), 'icon' => 'success']);
} catch (Exception $e) {
    return response()->json($e->getMessage(), 500);
}
}
public function show($id)
{
$role = Role::find($id);
$rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
->where("role_has_permissions.role_id",$id)
->get();

return view('roles.show',compact('role','rolePermissions'));
}
public function edit($id)
{
    try{
$row = Role::find($id);
$permission = Permission::get();
$rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
->all();

return view('backend.roles.form',compact('row','permission','rolePermissions'));

} catch (Exception $e) {
    return response()->json($e->getMessage(), 500);
}
}
public function update(RoleRequest $request, $id)
{
try{

$role = Role::find($id);
$role->name = $request->input('name');
$role->save();

$role->syncPermissions($request->input('permission'));

return response()->json(['message' =>__('messages.update'), 'icon' => 'success']);
} catch (Exception $e) {
    return response()->json($e->getMessage(), 500);
}
}
public function destroy($id)
{
    try{
DB::table("roles")->where('id',$id)->delete();
return response()->json(['message' =>__('messages.delete'), 'icon' => 'success']);
} catch (Exception $e) {
    return response()->json($e->getMessage(), 500);
}
}
}
