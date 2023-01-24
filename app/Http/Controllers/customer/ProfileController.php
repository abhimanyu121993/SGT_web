<?php

namespace App\Http\Controllers\customer;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\customer\Customer;
use App\Models\customer\CustomerProfile;
use App\Models\TimeZone;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        $user = Customer::find($id);
        $countries = Country::get();
        $timezones = TimeZone::get();
        return view('customer.profile',compact('user', 'countries', 'timezones'));
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
        $request->all();
        try{
            $customer = Customer::find($id);
            $customer->update([
                'name' => $request->first_name . ' ' . $request->last_name
            ]);
            if ($customer) {
                CustomerProfile::updateOrCreate([
                    'customer_id' => $customer->id,
                ],[
                    'first_name'=>$request->first_name,
                    'last_name'=>$request->last_name ?? '',
                    'mobileno'=>$request->mobileno ?? '',
                    'gender'=>$request->gender ?? '',
                    'dob'=>$request->dob ?? '',
                    'city_id'=>$request->city ?? '',
                    'address'=>$request->address ?? '',
                    'time_zone_id'=>$request->timezone_id ?? '',
                    'currency_id'=>$request->currency_id ?? '',
                    'company_name'=>$request->company_name ?? '',
                    'federal_ein'=> $request->federal_ein ?? '',
                    'bsis_number'=> $request->bsis_number ?? '',

                ]);

                Session::flash('success', 'User updated successfully');
                return redirect()->back();
            }
            else{
                Session::flash('warning', 'Something went wrong !');
                return redirect()->back();
            }
        }
        catch(Exception $ex){
            Helper::handleError($ex);
            return redirect()->back();
        }

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
