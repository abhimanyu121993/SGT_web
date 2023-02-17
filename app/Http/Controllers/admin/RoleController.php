<?php

namespace App\Http\Controllers\admin;

use App\DataTables\CurrencyDataTable;
use App\DataTables\RoleDataTable;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Currency;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:role_read,admin')->only('index');
        $this->middleware('permission:role_create,admin')->only('store');
        $this->middleware('permission:role_delete,admin')->only('destroy');
        $this->middleware('permission:role_edit,admin')->only('edit','update');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //For view the (Role) page.
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
        return view('role_permission.role_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   //For store data in role table.

    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required',
        ]);
        try
        {
       if(Role::where([ 'name' => Auth::guard('admin')->user()->id.'_'.$request->role,
       'guard_name' => 'admin',])->exists()){
            Session::flash('error', 'This Role is already exists');
            return redirect()->back();
       }
       $res= Role::create([
            'name' => Auth::guard('admin')->user()->id.'_'.$request->role,
            'guard_name' => 'admin',
            'created_by'=>Auth::guard('admin')->user()->id
        ]);
        if($res){
        return redirect()->back()->with('success','Role has been created successfully.');

        }
        return redirect()->back()->with('error','Role not created!.');
    }
    catch(Exception $ex){
        Helper::handleError($ex);
    }
    return redirect()->back();
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
     //For show the editing page.

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $RoleEdit=Role::find($id);
        $roles=Role::where('created_by',Auth::guard('admin')->user()->id ?? '')->where('guard_name',Role::$admin)->paginate(10);
        return view('role_permission.role_create', compact('roles','RoleEdit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //For update the the edited data.

    public function update(Request $request, $id)
    {
        $request->validate([
            'role' => 'required',
        ]);
        try{
        if(Role::where([ 'name' => Auth::guard('admin')->user()->id.'_'.$request->role,
        'guard_name' => 'admin',])->exists()){
             Session::flash('error', 'This Role is already exists');
             return redirect()->back();
        }
        Role::find($id)->update([
            'name' => Auth::guard('admin')->user()->id.'_'.$request->role
        ]);
        return redirect()->back()->with('success','Role has been Updated successfully.'); 
    }
    catch(Exception $ex){
        Helper::handleError($ex);
    }
    return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //For deleting the data from role table.

    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        try{
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
    catch(Exception $ex){
        Helper::handleError($ex);
    }
    return redirect()->back();
    }
    // Fetch role from role table.
    public function fetch_role()
    {
        $Roles = Role::where('created_by',Auth::guard('admin')->user()->id ?? '')->where('guard_name',Role::$customer)->paginate(1);
        return response()->json($Roles);
    }
    //For assigning the permission.
    public function assign_permission()
    {
        $admin = Auth::guard('admin')->user();
        $admin->givePermissionTo(Permission::where('guard_name', 'admin')->get());
    }
}
