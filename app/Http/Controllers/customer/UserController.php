<?php

namespace App\Http\Controllers\customer;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\customer\Customer;
use App\Models\customer\CustomerProfile;
use App\Models\PermissionName;
use App\Models\Status;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use PHPUnit\TextUI\Help;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user_read,customer')->only('index');
        $this->middleware('permission:user_create,customer')->only('store');
        $this->middleware('permission:user_delete,customer')->only('destroy');
        $this->middleware('permission:user_edit,customer')->only('edit','update');
    }
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     //For view the (Create User) page.

    public function index()
    {
        $roles=Role::where('created_by',Helper::getOwner() ?? '')->where('guard_name',PermissionName::$customer)->get();
        return view('customer.user.register_user',compact('roles'));
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //For show the (Manage User) page.

    public function create()
    {
        $admin = Customer::where('created_by',Helper::getUserId())->where('type',Customer::$employee)->get();
        return view('customer.user.manage_user',compact('admin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //For store data in customer table.
    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'nullable',
            'email'=>'required|email|unique:customers,email',
            'password' => 'required|min:6',
            'cpassword' => 'same:password|min:6',
            'role_id'=>'required|exists:roles,id'
        ]);
        try
        {
            $customer= Customer::create(['created_by'=>Helper::getUserId(),
            'name'=>$request->first_name.' '.$request->last_name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'type'=>Customer::$employee,
            'owner_id'=>Helper::getOwner()         
        ]);
        if ($customer) {
            CustomerProfile::create([
                'customer_id'=>$customer->id,
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'email'=>$request->email,
                'mobileno'=>$request->mobile,
                'status'=>Status::where('name','active')->where('type','general')->first()->id,
            ]);
        }
            $role_name = Role::find($request->role_id);
            if($customer)
            {
                $customer->assignRole($role_name);
                session()->flash('success','User added sucessfully');
            }
            else
            {
                session()->flash('error','User not added ');
            }
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
        $id=Crypt::decrypt($id);
        $roles=Role::where('created_by',Helper::getOwner())->where('guard_name',PermissionName::$customer)->get();
        $customer=Customer::find($id);
        if($customer)
        {
            return view('customer.user.register_user',compact('roles','customer'));
        }
        else
        {
            session::flash('error','Something Went Wrong OR Data is Deleted');
            return redirect()->back();
        }
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
            'first_name'=>'required',
            'last_name'=>'nullable',
            'email'=>'required',
        ]);
        try
        {
             $res= Customer::find($id)->update([
            'name'=>$request->first_name.' '.$request->last_name,
            'email'=>$request->email,
        ]);
        if($res){
            CustomerProfile::where('customer_id',$id)->first()->update([
                'mobileno'=>$request->mobile
            ]);
        }
        $role = Role::find($request->role_id);

        if($res)
        {
            $admin = Customer::find($id);
            $admin->syncRoles($role->name);
                session()->flash('success','User updated sucessfully');
            }
            else
            {
                session()->flash('error','User not updated ');
            }
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
    //For deleting the data from customer table.

    public function destroy($id)
    {
        $id=Crypt::decrypt($id);
        try{
                $res=Customer::find($id)->delete();
                if($res)
                {
                    session()->flash('success','User deleted sucessfully');
                }
                else
                {
                    session()->flash('error','Subscription not deleted ');
                }
            }
            catch(Exception $ex){
                Helper::handleError($ex);
            }
            return redirect()->back();
    }

   //For change the status of Isactive.
    public function is_active($id)
    {
        $is_active=Customer::find($id);

        if($is_active->isactive==1)
        {
            $is_active->isactive=0;
        }else
        {
            $is_active->isactive=true;
        }
        if($is_active->update()){
           return 1;
        }
        else
        {
           return 0;

        }
    }
}
