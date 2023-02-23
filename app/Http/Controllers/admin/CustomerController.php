<?php

namespace App\Http\Controllers\admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\customer\Customer;
use App\Models\customer\CustomerProfile;
use App\Models\customer\Property;
use App\Models\CustomerSubscribePack;
use App\Models\PermissionName;
use App\Models\Status;
use App\Models\Subscription;
use App\Models\TimeZone;
use App\Notifications\CustomerRegisterNoti;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;

class CustomerController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('permission:customer_create,admin')->only('store');
        $this->middleware('permission:customer_delete,admin')->only('destroy');
        $this->middleware('permission:customer_edit,admin')->only('edit','update');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
       
        $customers = Customer::with('customer_profile')->where('created_by',Helper::getUserId())->where('type',Customer::$owner)->get();
        return view('admin.customer.manage_customer',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::get();
        $plans = Subscription::where('status_id',Status::where('name','active')->where('type','general')->first()->id)->get();
        return view('admin.customer.register_customer',compact('countries','plans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //for store customer details
    public function store(Request $request)
    {
        $request->validate([
            'membership_plan'=>'required|numeric',
            'first_name'=>'required|string',
            'email'=>'required|email|unique:customers,email',
            'mobileno'=>'required|regex:/^[6-9][0-9]{9}$/',
            'city'=>'required|exists:cities,id',
            'timezone_id'=>'required|exists:time_zones,id',
            'currency_id'=>'required|exists:currencies,id',
            'company_name'=>'required',
            'federal_ein'=>'required',
            'bsis_number'=>'required|numeric',
        ]);

        try {
            $customer = Customer::create([
                'name' => $request->first_name . ' ' . $request->last_name,
                'email' => $request->email,
                'password' => Hash::make('12345678'),
                'type'=>Customer::$owner,
                'created_by'=> Helper::getUserId(),
            ]);
            if ($customer) {
                CustomerProfile::create([
                    'customer_id'=>$customer->id,
                    'first_name'=>$request->first_name,
                    'last_name'=>$request->last_name,
                    'email'=>$request->email,
                    'mobileno'=>$request->mobileno,
                    'gender'=>$request->gender,
                    'dob'=>$request->dob,
                    'city_id'=>$request->city??0,
                    'state_id'=>$request->state ?? 0,
                    'country_id'=>$request->country ?? 0,
                    'address'=>$request->address,
                    'time_zone_id'=>$request->timezone_id,
                    'currency_id'=>$request->currency_id,
                    'status'=>Status::where('name','active')->where('type','general')->first()->id,
                    'company_name'=>$request->company_name,
                    'federal_ein'=> $request->federal_ein,
                    'bsis_number'=> $request->bsis_number,
                    'pincode'=> $request->pincode,

                ]);

              $customerProfile=  CustomerSubscribePack::create([
                    'customer_id'=>$customer->id,
                    'subscribe_id'=>$request->membership_plan,
                    'taken'=>Carbon::now(),
                    'start'=>Carbon::now(),
                    'expiry'=>Carbon::now()->addDays(Subscription::find($request->membership_plan)->days),
                    'amount'=>0.00,
                    'currency_id'=>$request->currency_id

                ]);
                if($customerProfile){
                    Notification::send(Auth::guard(Session::get('guard'))->user(), new CustomerRegisterNoti($customerProfile));
                    Session::flash('success', 'Customer Created and Package allot successfully');
                }
            } else {
                Session::flash('error', 'Customer not created');
            }
            return redirect()->back();
        }
        catch(Exception $ex){
            Helper::handleError($ex);
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //code 
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
        $countries = Country::get();
        $plans = Subscription::where('status_id',Status::where('name','active')->where('type','general')->first()->id)->get();
        $CustomerEdit=Customer::find($id);
        if($CustomerEdit)
        {
            return view('admin.customer.register_customer',compact('countries','plans','CustomerEdit'));     
        }
        else
        {
            Session::flash('error','Something Went Wrong OR Data is Deleted');
            return redirect()->back();
        }    }

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
            'membership_plan'=>'required|numeric',
            'first_name'=>'required|string',
            'mobileno'=>'required|regex:/^[6-9][0-9]{9}$/',
            'city'=>'required|exists:cities,id',
            'timezone_id'=>'required|exists:time_zones,id',
            'currency_id'=>'required|exists:currencies,id',
            'company_name'=>'required',
            'federal_ein'=>'required',
            'bsis_number'=>'required|numeric',
        ]);
        try
        {
            $customer = Customer::find($id)->update([
                'name' => $request->first_name . ' ' . $request->last_name,
                'email' => $request->email,
            ]);
            if ($customer) {
                CustomerProfile::where('customer_id',$id)->update([
                    'first_name'=>$request->first_name,
                    'last_name'=>$request->last_name,
                    'email'=>$request->email,
                    'mobileno'=>$request->mobileno,
                    'gender'=>$request->gender,
                    'dob'=>$request->dob,
                    'city_id'=>$request->city??0,
                    'state_id'=>$request->state ?? 0,
                    'country_id'=>$request->country ?? 0,
                    'address'=>$request->address,
                    'time_zone_id'=>$request->timezone_id,
                    'currency_id'=>$request->currency_id,
                    'status'=>Status::where('name','active')->where('type','general')->first()->id,
                    'company_name'=>$request->company_name,
                    'federal_ein'=> $request->federal_ein,
                    'bsis_number'=> $request->bsis_number,
                    'pincode'=> $request->pincode,
                ]);
            }
            if($customer){ 
              $customerProfile=  CustomerSubscribePack::where('customer_id',$id)->update([
                    'subscribe_id'=>$request->membership_plan,
                    'taken'=>Carbon::now(),
                    'start'=>Carbon::now(),
                    'expiry'=>Carbon::now()->addDays(Subscription::find($request->membership_plan)->days),
                    'amount'=>0.00,
                    'currency_id'=>$request->currency_id,
              ]);
               
            }
                if($customer)
        {
                session()->flash('success','Customer updated sucessfully');
            }
            else
            {
                session()->flash('error','Customer not updated ');
            }
    }
        catch(Exception $ex){
            Helper::handleError($ex);
        }
        return redirect()->back();    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //For deleting the data from Customer table.

    public function destroy($id)
    {
        $id=Crypt::decrypt($id);
        try{
                $res=Customer::find($id)->delete();
                if($res)
                {
                    session()->flash('success','Customer deleted sucessfully');
                }
                else
                {
                    session()->flash('error','Customer not deleted ');
                }
            }
            catch(Exception $ex){
                Helper::handleError($ex);
            }
            return redirect()->back();  
        
        }

}
