<?php

namespace App\Http\Controllers\admin;

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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $error=ProjectError::all();
        $status=Status::all();
        $currency=Currency::all();
        return view('admin.subscription.create',compact('error','status','currency'));
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subscription = Subscription::all();
        return view('admin.subscription.manage',compact('subscription'));
    
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
            'title'=>'required',
            

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
            $res= Subscription::create(['created_by'=>Auth::guard('admin')->user()->id,'title'=>$request->title,'currency'=>$request->currency,'days'=>$request->days,'price'=>$request->price,'free_trial_days'=>$request->free_trial_days??0,'limit'=>$request->limit??0,'status_id'=>$request->status,'icon'=>$icon,'img'=>$img,'color'=>$request->color,'bg_color'=>$request->bg_color,'life_time'=>$request->lifetime??0]);

            if($res)
            {
                session()->flash('success','Subscription Added Sucessfully');
            }
            else
            {
                session()->flash('error','Subscription not added ');
            }
        }
        catch(Exception $ex)
        {
            $url=URL::current();
            ProjectError::create(['url'=>$url,'message'=>$ex->getMessage()]);
            Session::flash('error','Server Error ');
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
    public function edit($id)
    {
        $id=Crypt::decrypt($id);
        $status=Status::all();
        $currency=Currency::all();

        $EditSubscription=Subscription::find($id);
        if($EditSubscription)
        {
            return view('admin.subscription.create',compact('EditSubscription','status','currency'));
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'title'
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
            $res= Subscription::find($id)->update(['title'=>$request->title,'currency'=>$request->currency,'days'=>$request->days,'price'=>$request->price,'free_trial_days'=>$request->free_trial_days??0,'limit'=>$request->limit??0,'status_id'=>$request->status,'color'=>$request->color,'bg_color'=>$request->bg_color,'life_time'=>$request->lifetime??0]);

            if($res)
            {
                session()->flash('success','Subscription Updated Sucessfully');
            }
            else
            {
                session()->flash('error','Subscription not Update ');
            }
        }
        catch(Exception $ex)
        {
            $url=URL::current();
            ProjectError::create(['url'=>$url,'message'=>$ex->getMessage()]);
            Session::flash('error','Server Error ');
        }
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
            catch(Exception $ex)
            {
                $url=URL::current();
                ProjectError::create(['url'=>$url,'message'=>$ex->getMessage()]);
                Session::flash('error','Server Error ');
            }
            return redirect()->back();
    }
}
