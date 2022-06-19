<?php

namespace App\Http\Controllers\backend\api\role;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    //
    public  function __construct()
    {
        //  $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
        //  $this->middleware('permission:role-create', ['only' => ['create','store']]);
        //  $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    public function index(Request $request){
        $q=request('query');
        $roles=Role::latest()
        ->where('name', 'like', '%' . $q . '%')
        ->with('users:id,name')
        ->paginate((int)env('PER_PAGE'));
        $user= new User();
        $users=$user->getUsers($request,false);
        return response()->json(['roles'=>$roles,'users'=>$users]);
    }
    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255','unique:roles'],
        ]);

        $users_ids=collect($request->users)->pluck('id');
        $users=User::WhereIn('id',   $users_ids)->get();
        $role = Role::create(['name' =>Str::slug( $request->name,'-')]);
        $role->users()->attach($users);
        return response()->json(['message'=>'Role has been created successfully.','role'=>$role]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => ['required', 'string', 'max:255','unique:roles,name,'.$id],
        ]);
        $role = Role::findOrFail($id);
        $role->update(['name'=>Str::slug( $request->name,'-')]);
        $users_ids=collect($request->users)->pluck('id');
        $users=User::WhereIn('id',   $users_ids)->get();
        $role->users()->sync($users);
        return response()->json(['message'=>'Role has been updated successfully.','role'=>$role]);
    }
    public function destroy($id)
    {
      $role=Role::destroy($id);
      return response()->json(['message'=>'Role has been deleted successfully.']);
    }
}
