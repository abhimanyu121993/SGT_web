<?php

namespace App\Http\Controllers\admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\admin\Admin;
use App\Models\admin\AdminProfile;
use App\Models\PermissionName;
use App\Models\ProjectError;
use App\Models\SecurityGuard;
use App\Models\Status;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
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
        $roles=Role::where('created_by',Helper::getUserId() ?? '')->where('guard_name',PermissionName::$admin)->get(); //fetching the role according to guard.
        return view('user.create',compact('roles'));
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //For show the (Manage User) page.
    public function create()
    {
        $admin = Admin::where('created_by',Helper::getUserId())->where('type',Admin::$sub_admin)->get();
        return view('user.manage',compact('admin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //For store data in admin table.

    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'nullable',
            'email'=>'required|unique:admins,email',
            'password' => 'required|min:6',
            'cpassword' => 'required|same:password|min:6'
        ]);
        try
        {
            $admin= Admin::create(['created_by'=>Helper::getUserId(),
            'name'=>$request->first_name.' '.$request->last_name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'type'=>Admin::$sub_admin,
            'is_active'=>true            
        ]);
        if ($admin) {
            AdminProfile::create([
                'admin_id'=>$admin->id,
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'email'=>$request->email,
                'mobileno'=>$request->mobile,
                'gender'=>$request->gender,
                'dob'=>$request->dob,
            ]);
        }
       $role_name = Role::find($request->role_id);
            if($admin)
            {
                $admin->assignRole($role_name);
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
        $roles=Role::where('created_by',Auth::guard('admin')->user()->id ?? '')->where('guard_name',PermissionName::$admin)->get();
        $user=Admin::find($id);
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
            'first_name'=>'required',
            'first_name'=>'nullable',
            'email'=>'required',
        ]);
        try
        {
             $res= Admin::find($id)->update([
            'name'=>$request->first_name.' '.$request->last_name,
            'email'=>$request->email,
        ]);


        $role = Role::find($request->role_id);

        if($res)
        {
            AdminProfile::where('admin_id',$id)->first()->update([
                'mobileno'=>$request->mobile
            ]);
            $admin = Admin::find($id);
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
     //For deleting the data from admin table.
    public function destroy($id)
    {
        $id=Crypt::decrypt($id);
        try{    
            
                $res=Admin::find($id)->delete();

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
       $is_active=Admin::find($id);

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


   public function verifyCheck($id)
    {
            if (Admin::where('id', $id)->exists()) {
                $verified= Admin::find($id);
                if ($verified->verify == false) {
                    $verified->verify = true;
                 } else {
                    $verified->verify = false;
                }
                if ($verified->update()) {
                            return true;
                        } else {
                            return false;
                        } 
              }    
         }
}
