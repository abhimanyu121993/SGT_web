<?php

namespace App\Http\Controllers\customer;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\customer\Checkpoint;
use App\Models\customer\CheckpointHasTask;
use App\Models\customer\Task;
use App\Models\Status;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use PHPUnit\TextUI\Help;

class CheckpointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:Checkpoint_read,customer')->only('index');
        $this->middleware('permission:Checkpoint_create,customer')->only('store');
        $this->middleware('permission:Checkpoint_delete,customer')->only('destroy');
        $this->middleware('permission:Checkpoint_edit,customer')->only('edit','update');
    }

    public function index()
    {
        $status=Status::where('type','general')->get();
        $checkpoints = Checkpoint::where('property_id',$id)->get();
        return view('customer.checkpoint.register_checkpoint');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status=Status::where('type','general')->get();
        $checkpoints = Checkpoint::where('owner_id',Helper::getOwner())->get();
        return view('customer.checkpoint.manage_checkpoint', compact('checkpoints','status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //For store data in property table.

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
                'name'=>$request->name,
                'desc'=>$request->description,
                'file'=>$images,
                'longitude'=>$request->longitude,
                'lattitude'=>$request->lattitude,
                'color'=>$request->color,
                'status_id'=>1,
                'task_id'=>json_encode($request->task_id),
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
        $checkpoint=Checkpoint::find($id);
        $status=Status::where('type','general')->get();
        $tasks=Task::where('owner_id',Helper::getOwner())->get();
        $checkpoints = Checkpoint::where('owner_id',Helper::getOwner())->get();
        if($checkpoint)
        {
            return view('customer.checkpoint.manage_checkpoint', compact('checkpoints','status','checkpoint','tasks'));
        }
        else
        {   
            Session::flash('error','Something Went Wrong OR Data is Deleted');
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
            'name'=>'required|string',       
         ]);
        try
        {
            if($request->hasFile('images'))
            {
                $image='Checkpoint-'.time().'-'.rand(0,99).'.'.$request->images->extension();
                $request->images->move(public_path('upload/Checkpoint/'),$image);
                $oldimage=Checkpoint::find($id)->pluck('images')[0];
                File::delete(public_path($oldimage));
                Checkpoint::find($id)->update(['images'=>'upload/checkpoint/'.$image]);
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
    //For deleting the data from property table.

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
        public function showcheckpoint($id)
        {
            $status=Status::where('type','general')->get();
            $tasks=Task::where('owner_id',Helper::getOwner())->get();
            $checkpoints = Checkpoint::where('property_id',$id)->get();
            $property_id=$id;
            return view('customer.checkpoint.manage_checkpoint', compact('checkpoints','status','property_id','tasks'));
        }
}