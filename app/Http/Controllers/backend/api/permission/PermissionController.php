<?php

namespace App\Http\Controllers\backend\api\permission;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    //
    function __construct()
    {
        //  $this->middleware('permission:permission-list|permission-create|permission-edit|permission-delete', ['only' => ['index','store']]);
        //  $this->middleware('permission:permission-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:permission-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request){
        $q=!empty(request('query')) ? request('query') : '';
        $permissions = Permission::latest()->where('name', 'LIKE', '%' . $q . '%')
                                          ->with('roles:id,name')
                                          ->paginate(env('PAR_PAGE'));
        $users=User::select('id','name')->orderBy('name', 'ASC')->get();
        $roles=Role::select('id','name')->orderBy('name', 'ASC')->get();
        return response()->json(['permissions'=>$permissions,'roles'=>$roles,'users' => $users], 200);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255','unique:permissions'],
        ]);

        $roles=Role::WhereIn('id',  $request->roles)->get();

        $users_ids=collect($request->users)->pluck('id');
        $users=User::WhereIn('id',   $users_ids)->get();
        $permission = Permission::create(['name' => $request->name]);
        $permission->users()->attach($users);
        $permission->syncRoles($roles);

        return response()->json(['message'=>'Permission has been created successfully.','permission'=>$permission]);
    }





    public function update(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255','unique:permissions,name,'.$request->id],
        ]);


        $permission = Permission::find($request->id);
        $permission->name=$request->name;
        $permission->save();
        $role_ids=collect($request->roles)->pluck('id');
        $roles=Role::WhereIn('id',  $role_ids)->get();

        $users_ids=collect($request->users)->pluck('id');
        $users=User::WhereIn('id',   $users_ids)->get();
        $permission->users()->sync($users);
        $permission->roles()->sync($roles);
        return response()->json(['message'=>'Permission has been updated successfully.','permission'=>$permission]);
    }


    public function destroy($id)
    {
        Permission::destroy($id);
        return response()->json(['message'=>'Permission has been deleted successfully.']);
        //
    }
}
