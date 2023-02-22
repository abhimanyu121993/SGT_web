<?php

namespace App\Http\Controllers\customer;

use App\Helpers\Helper;
use App\Helpers\ImageUpload;
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
     //For show the editing page.

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
     //For update the the edited data.

    public function update(Request $request, $id)
    {
        $request->all();
        try{
               $res= CustomerProfile::updateOrCreate(['customer_id' => $id ],[
                    'first_name'=>$request->first_name,
                    'last_name'=>$request->last_name ?? '',
                    'mobileno'=>$request->mobileno ?? '',
                    'email'=>$request->email ?? '',
                    'gender'=>$request->gender ?? 'm',
                    'dob'=>$request->dob ?? '',
                    'city_id'=>$request->city ?? 0,
                    'state_id'=>$request->state ?? 0,
                    'country_id'=>$request->country ?? 0,
                    'address'=>$request->address ?? '',
                    'time_zone_id'=>$request->timezone_id ?? 0,
                    'currency_id'=>$request->currency_id ?? 0,
                    'company_name'=>$request->company_name ?? 0,
                    'federal_ein'=> $request->federal_ein ?? '',
                    'bsis_number'=> $request->bsis_number ?? '',
                ]);
                $request->hasFile('profile')?CustomerProfile::updateOrCreate(['customer_id' => $id ],['pic'=>ImageUpload::simpleUpload('customer',$request->profile,'profile')]):'';
             if($res){
                Session::flash('success', 'User updated successfully');
             }
            else{
                Session::flash('warning', 'Something went wrong !');
            }
            return redirect()->back();

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
