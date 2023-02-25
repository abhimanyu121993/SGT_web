<?php

namespace App\Http\Controllers\admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\ProjectError;
use App\Models\Status;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Exception;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:subscription_read,admin')->only('index');
        $this->middleware('permission:subscription_create,admin')->only('store');
        $this->middleware('permission:subscription_delete,admin')->only('destroy');
        $this->middleware('permission:subscription_edit,admin')->only('edit','update');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //For view the (Create Subscription) page.
    public function index()
    {
        $currency=Helper::getCurrencies(); //fetching the all currency from helper.
        return view('admin.subscription.create',compact('currency'));
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //For show the (Manage Subscription ) page.
    public function create()
    {
        $subscription = Subscription::where('created_by',Helper::getUserId())->get(); //fetching the all subscription from the helper
        return view('admin.subscription.manage',compact('subscription'));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //For store data in Subscription table.
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'currency'=>'required',
            'price'=>'required',
            'guard_qty'=>'required|numeric',
            'property_qty'=>'required|numeric',
            'shift_qty'=>'required|numeric',
            'checkpoint_qty'=>'required|numeric'          
        ]);
        try
        {
            $icon = '';
            $img = '';
            if($request->hasFile('icon'))
            {
                $icon='subscription-'.time().'-'.rand(0,99).'.'.$request->icon->extension();
                $request->icon->move(public_path('upload/subcription/icon/'),$icon);
                $icon = 'upload/subcription/icon/'.$icon;
            }
            if($request->hasFile('image'))
            {
                $img='subscription-'.time().'-'.rand(0,99).'.'.$request->image->extension();
                $request->image->move(public_path('upload/subcription/img/'),$img);
                $img = 'upload/subcription/img/'.$img;
            }
            $res= Subscription::create(['created_by'=>Auth::guard('admin')->user()->id,
            'title'=>$request->title,
            'currency'=>$request->currency,
            'days'=>$request->days,
            'price'=>$request->price,
            'free_trial_days'=>$request->free_trial_days??0,
            'limit'=>$request->limit??0,
            'is_active'=>$request->is_active,
            'icon'=>$icon,
            'img'=>$img,
            'color'=>$request->color,
            'bg_color'=>$request->bg_color,
            'life_time'=>$request->lifetime??0,
            'desc'=>$request->desc,
            'guard_qty'=>$request->guard_qty,
            'property_qty'=>$request->property_qty,
            'shift_qty'=>$request->shift_qty,
            'checkpoint_qty'=>$request->checkpoint_qty,
        ]);

            if($res)
            {
                session()->flash('success','Subscription Added Sucessfully');
            }
            else
            {
                session()->flash('error','Subscription not added ');
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
        $id=Crypt::decrypt($id);           //Decrypting the Encrypted id.
        $currency=Helper::getCurrencies(); //Fetching currency from helper.

        $EditSubscription=Subscription::find($id);
        if($EditSubscription)
        {
            return view('admin.subscription.create',compact('EditSubscription','currency'));
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
            'title'=>'required',
            'currency'=>'required',
            'price'=>'required',  
        ]);
        try
        {
            if($request->hasFile('icon'))
            {
                $icon='subscription-'.time().'-'.rand(0,99).'.'.$request->icon->extension();
                $request->icon->move(public_path('upload/subcription/icon/'),$icon);
                $oldicon=Subscription::find($id)->pluck('icon')[0];
                File::delete(public_path($oldicon));
                Subscription::find($id)->update(['icon'=>'upload/subcription/icon/'.$icon]);
            }
            if($request->hasFile('image'))
            {
                $image='subscription-'.time().'-'.rand(0,99).'.'.$request->image->extension();
                $request->image->move(public_path('upload/subcription/img/'),$image);
                $oldimage=Subscription::find($id)->pluck('img')[0];
                File::delete(public_path($oldimage));
                Subscription::find($id)->update(['img'=>'upload/subcription/img/'.$image]);
            }
            $res= Subscription::find($id)->update([
                'title'=>$request->title,
                'currency'=>$request->currency,
                'days'=>$request->days,
                'price'=>$request->price,
                'free_trial_days'=>$request->free_trial_days??0,
                'limit'=>$request->limit??0,
                'is_active'=>$request->is_active,
                'color'=>$request->color,
                'bg_color'=>$request->bg_color,
                'life_time'=>$request->lifetime??0,
                'desc'=>$request->desc,

            ]);
            if($res)
            {
                session()->flash('success','Subscription Updated Sucessfully');
            }
            else
            {
                session()->flash('error','Subscription not Update ');
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
    //For deleting the data from subscription table.
    public function destroy($id)
    {
        $id=Crypt::decrypt($id);
        try{
                $res=Subscription::find($id)->delete();
                if($res)
                {
                    session()->flash('success','Subscription deleted Sucessfully');
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

    //For change the status of limit.

    public function is_limit($id)
    {
        $limit=Subscription::find($id);

        if($limit->limit==1)
        {
            $limit->limit=0;
        }else
        {
            $limit->limit=true;
        }
        if($limit->update()){
           return 1;
        }
        else
        {
           return 0;

        }
    }

     //For change the status of lifetime.

    public function is_life_time($id)
    {
        $life_time=Subscription::find($id);

        if($life_time->life_time==1)
        {
            $life_time->life_time=0;
        }else
        {
            $life_time->life_time=true;
        }
        if($life_time->update()){
           return 1;
        }
        else
        {
           return 0;

        }
    }
    //For active and deactive subscription plan
    public function is_active($id)
    {
        $is_active=Subscription::find($id);

        if($is_active->is_active==1)
        {
            $is_active->is_active=0;
        }else
        {
            $is_active->is_active=true;
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