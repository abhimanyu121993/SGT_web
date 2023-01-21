<?php

namespace App\Http\Controllers\admin;

use App\DataTables\CurrencyDataTable;
use App\DataTables\RoleDataTable;
use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RoleDataTable $dataTable)
    {
        // return $dataTable->render('role_permission.role');
        $roles=Role::where('created_by',Auth::guard('admin')->user()->id ?? '')->where('guard_name',Role::$admin)->paginate(10);
        return view('role_permission.role', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required',
        ]);
       if(Role::where([ 'name' => Auth::guard('admin')->user()->id.'_'.$request->role,
       'guard_name' => 'admin',])->exists()){
            Session::flash('error', 'This Role is already exists');
            return redirect()->back();
       }
        Role::create([
            'name' => Auth::guard('admin')->user()->id.'_'.$request->role,
            'guard_name' => 'admin',
            'created_by'=>Auth::guard('admin')->user()->id
        ]);
        return redirect()->back()->with('success','Role has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $RoleEdit=Role::find($id);
        $Roles = Role::where('created_by',Auth::guard('admin')->user()->id)->where('guard_name','admin')->get();
        return view('role_permission.role', compact('Roles','RoleEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'role' => 'required',
        ]);
        if(Role::where([ 'name' => Auth::guard('admin')->user()->id.'_'.$request->role,
        'guard_name' => 'admin',])->exists()){
             Session::flash('error', 'This Role is already exists');
             return redirect()->back();
        }
        Role::find($id)->update([
            'name' => Auth::guard('admin')->user()->id.'_'.$request->role
        ]);
        return redirect()->back()->with('success','Role has been Updated successfully.');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $data=Role::find($id);
        if($data->delete())
        {
            return redirect()->back()->with('success','Data Deleted successfully.');
        }
        else
        {
            return redirect()->back()->with('error','Data not deleted.');
        }    
    }
    public function fetch_role()
    {
        $Roles = Role::where('created_by',Auth::guard('admin')->user()->id ?? '')->where('guard_name',Role::$customer)->paginate(1);
        return response()->json($Roles);
    }
    public function assign_permission()
    {
        $admin = Auth::guard('admin')->user();
        $admin->givePermissionTo(Permission::where('guard_name', 'admin')->get());
    }
}
