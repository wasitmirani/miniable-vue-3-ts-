<?php

namespace App\Http\Controllers\backend\api\auditor;

use App\Models\Auditor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuditorController extends Controller
{
    //
    public function index(Request $request){
        $q=request('query');
        $auditors =Auditor::latest()->where('name', 'like', '%' . $q . '%')
                         ->paginate((int)env('PER_PAGE'));
        return response()->json(['auditors'=>$auditors]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'min:3','max:255'],
            'email' => ['required', 'string', 'email','max:255','unique:auditors'],
        ]);

        $auditor =Auditor::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'company'=>$request->company,
            'location'=>$request->location,
            'user_id'=>$request->user()->id,
        ]);
        return response()->json(['message'=>'Auditor has been created successfully.','auditor'=>$auditor]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => ['required', 'string', 'min:3','max:255'],
            'email' => ['required', 'string', 'email','max:255','unique:auditors,id,'.$id],
        ]);

        $auditor =Auditor::where('id',$id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'company'=>$request->company,
            'location'=>$request->location,
        ]);
        return response()->json(['message'=>'Auditor has been created successfully.','auditor'=>$auditor]);
    }

    public function destroy($id)
    {

        $user=Auditor::destroy($id);
        if($user)
          return response()->json(['message' => 'Auditor has been destroyed successfully'], 200);
        else
            return response()->json(['message' => 'Auditor has not been not found'], 400);
    }
}
