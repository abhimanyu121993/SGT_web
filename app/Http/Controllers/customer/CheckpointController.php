<?php

namespace App\Http\Controllers\customer;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\customer\Checkpoint;
use App\Models\customer\CheckpointHasTask;
use App\Models\customer\Property;
use App\Models\customer\Task;
use App\Models\PermissionName;
use App\Models\Status;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
class CheckpointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    public function index()
    {
        // code here
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //for show the (Qr Map) page.
    public function create()
    {
        $status=Status::where('type','general')->get();
        $checkpoints = Checkpoint::where('owner_id',Helper::getOwner())->get();
        return view('customer.property.qr_map', compact('checkpoints','status'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //For store data in checkpoint table.

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
        ]);
        try{
            $images = '';
            if($request->hasFile('images'))
            {
                $images='Checkpoint-'.time().'-'.rand(0,99).'.'.$request->images->extension();
                $request->images->move(public_path('upload/checkpoint/'),$images);
                $images = 'upload/checkpoint/'.$images;
            }
           $checkpoint= Checkpoint::create([
                'owner_id'=>Helper::getOwner(),
                'property_id'=>$request->property_id,
                'checkpoint_id'=>Str::random(30),
                'name'=>$request->name,
                'desc'=>$request->description,
                'file'=>$images,
                'longitude'=>$request->longitude,
                'lattitude'=>$request->lattitude,
                'color'=>$request->color,
                'status_id'=>1,
                'created_by'=>Auth::guard(Helper::getGuard())->user()->id,
                'task_id'=>json_encode($request->task_id)
            ]);
            if (is_array($request->task_id) and $request->task_id[0]!=null) {
              foreach ($request->task_id as $i) {
                        $res = CheckpointHasTask::create(['checkpoint_id' => $checkpoint->id,'task_id' => $i]);
                }
            
            }  
            else{
               Session::flash('success', 'Checkpoint created but task not alloted');
               return redirect()->back();

            }
      if($res){
       Session::flash('success', 'Checkpoint created successfully');

}
else{
    Session::flash('error', 'Checkpoint not created');

}
            return redirect()->back();
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
    //for show the single property details.
    public function show($id)
    {
        $id=Crypt::decrypt($id);
        $status=Status::where('type','general')->get();
        $tasks=Task::where('owner_id',Helper::getOwner())->get();
        $checkpoints = Checkpoint::where('property_id',$id)->get();
        $property_id=$id;
        $property=Property::find($id);
        return view('customer.property.qr_map', compact('checkpoints','status','property_id','tasks','property'));
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
        $checkpoint=Checkpoint::find($id);
        $status=Status::where('type','general')->get();
        $tasks=Task::where('owner_id',Helper::getOwner())->get();
        return view('customer.checkpoint.checkpoint', compact('checkpoint','status','tasks'));       
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
            'name'=>'required|string',       
         ]);
        try
        {
            if($request->hasFile('images'))
            {
                $image='Checkpoint-'.time().'-'.rand(0,99).'.'.$request->images->extension();
                $request->images->move(public_path('upload/Checkpoint/'),$image);
                $oldimage=Checkpoint::find($id)->pluck('file')[0];
                File::delete(public_path($oldimage));
                Checkpoint::find($id)->update(['file'=>'upload/checkpoint/'.$image]);
            }
             $checkpoint= Checkpoint::find($id)->update([ 
                'name'=>$request->name,
                'desc'=>$request->description,
                'longitude'=>$request->longitude,
                'lattitude'=>$request->lattitude,
                'color'=>$request->color,
        ]);
        if (is_array($request->task_id) and $request->task_id[0]!=null) {  
                CheckpointHasTask::where('checkpoint_id',$id)->delete(); 
            foreach ($request->task_id as $i) {
                    $res = CheckpointHasTask::create(['checkpoint_id' => $id,'task_id' => $i]);
              }
          
          } 
        if($checkpoint)
        {
                session()->flash('success','Checkpoint updated sucessfully');
            }
            else
            {
                session()->flash('error','Checkpoint not updated ');
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
    //For deleting the data from Checkpoint table.

    public function destroy($id)
    {
        $id=Crypt::decrypt($id);
        try{
                $res=Checkpoint::find($id)->delete();
                if($res)
                {
                    session()->flash('success','Checkpoint deleted sucessfully');
                }
                else
                {
                    session()->flash('error','Checkpoint not deleted ');
                }
            }
            catch(Exception $ex){
                Helper::handleError($ex);
            }
            return redirect()->back();  
          }

          //For change the status of Isactive.
          public function status(Request $request)
          {
        
            try
            {
                 $res= Checkpoint::find($request->checkpoint_id)->update([ 
                    'status_id' => $request->status_id,
               ]);
            if($res)
            {
                return response()->json([
                    'success' => 'Checkpoint status upadted' // for status 200
                ]);

                }
                else
                {
                    return response()->json([
                        'success' => 'Checkpoint status not upadted' // for status 503
                    ]);                }
            }
            catch(Exception $ex){
                Helper::handleError($ex);
            }
            // return response()
        }
        //for add checkpoint.
        public function addcheckpoint($id)
        {
            $id=Crypt::decrypt($id);
            $status=Status::where('type','general')->get();
            $tasks=Task::where('owner_id',Helper::getOwner())->get();
            $property=Property::find($id);
            return view('customer.checkpoint.checkpoint', compact('status','property','tasks'));
        }
}