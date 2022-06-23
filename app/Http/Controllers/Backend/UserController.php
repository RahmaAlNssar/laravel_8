<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//custom Spatie\Permission
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\DataTables\UserDataTable;
use Exception;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    public function index(UserDataTable $dataTable)
    {

        try {
            return $dataTable->render('backend.users.index');
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
    public function create()
    {
        try {
            $roles = Role::pluck('name', 'name')->all();
            return view('backend.users.form', compact('roles'));
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }
    public function store(UserRequest $request)
    {
        try{
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        return response()->json(['message' =>__('messages.save'), 'icon' => 'success']);
    } catch (Exception $e) {
        return response()->json($e->getMessage(), 500);
    }
    }
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }
    public function edit($id)
    {
        try{
        $row = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $row->roles->pluck('name', 'name')->all();

        return view('backend.users.form', compact('row', 'roles', 'userRole'));
    } catch (Exception $e) {
        return response()->json($e->getMessage(), 500);
    }
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
        try{
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        return response()->json(['message' =>__('messages.update'), 'icon' => 'success']);
    } catch (Exception $e) {
        return response()->json($e->getMessage(), 500);
    }
    }
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
