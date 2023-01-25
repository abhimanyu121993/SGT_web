<?php

namespace App\Http\Controllers\customer;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\customer\Customer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     //For view the (Create User) page.

    public function index()
    {
        $roles=Role::where('created_by',Helper::getUserId() ?? '')->where('guard_name',Role::$customer)->get();
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
            'name'=>'required',
            'email'=>'required',
            'password' => 'confirmed|min:6',
            'cpassword' => 'same:password|min:6'
        ]);
        try
        {
            $res= Customer::create(['created_by'=>Helper::getUserId(),
            'name'=>$request->fname.' '.$request->lname,
            'email'=>$request->email,
            'password'=>Hash::make($request->Password),
            'type'=>Customer::$employee,            
        ]);
       $role_name = Role::find($request->role_id);
            if($res)
            {
                $res->assignRole($role_name);
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
        $roles=Role::where('created_by',Auth::guard('admin')->user()->id ?? '')->where('guard_name',Role::$admin)->get();
        $user=Customer::find($id);
        if($user)
        {
            return view('user.create',compact('roles','user'));
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
            'name'=>'required',
            'email'=>'required',
        ]);
        try
        {
             $res= Customer::find($id)->update([
            'name'=>$request->fname.' '.$request->lname,
            'email'=>$request->email,
        ]);
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
        $ass_active=Customer::find($id);

        if($ass_active->isactive==1)
        {
            $ass_active->isactive=0;
        }else
        {
            $ass_active->isactive=true;
        }
        if($ass_active->update()){
           return 1;
        }
        else
        {
           return 0;

        }
    }
}
