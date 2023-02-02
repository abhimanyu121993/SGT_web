<?php

namespace App\Http\Controllers\admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\customer\Customer;
use App\Models\customer\CustomerProfile;
use App\Models\CustomerSubscribePack;
use App\Models\Status;
use App\Models\Subscription;
use App\Models\TimeZone;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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
        $customers = Customer::where('created_by',Helper::getUserId())->where('type',Customer::$owner)->get();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
