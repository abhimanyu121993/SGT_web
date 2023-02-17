<?php

namespace App\Http\Controllers\customer;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\customer\Task;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:task_read,customer')->only('index');
        $this->middleware('permission:task_create,customer')->only('store');
        $this->middleware('permission:task_delete,customer')->only('destroy');
        $this->middleware('permission:task_edit,customer')->only('edit','update');
    }

    public function index()
    {
        return view('customer.task.register_task');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //For show (Register property) page.
    public function create()
    {
        $tasks = Task::where('owner_id',Helper::getOwner())->get();
        return view('customer.task.manage_task', compact('tasks'));
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
                $images='task-'.time().'-'.rand(0,99).'.'.$request->images->extension();
                $request->images->move(public_path('upload/task/'),$images);
                $images = 'upload/task/'.$images;
            }
           $res= Task::create([
                'created_by'=>Helper::getUserId(),
                'owner_id'=>Helper::getOwner(),
                'name'=>$request->name,
                'desc'=>$request->description,
                'file'=>$images,
                'is_active'=>1,
            ]);
if($res){
    Session::flash('success', 'Task created successfully');

}
else{
    Session::flash('error', 'Task not created');

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
        $task=Task::find($id);
        if($task)
        {
            return view('customer.task.register_task',compact('task'));
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
                $image='task-'.time().'-'.rand(0,99).'.'.$request->images->extension();
                $request->images->move(public_path('upload/task/'),$image);
                $oldimage=Task::find($id)->pluck('file')[0];
                File::delete(public_path($oldimage));
                Task::find($id)->update(['file'=>'upload/task/'.$image]);
            }
             $res= Task::find($id)->update([ 
             'name' => $request->name,
             'desc'=>$request->description,
        ]);
        if($res)
        {
                session()->flash('success','Task updated sucessfully');
            }
            else
            {
                session()->flash('error','Task not updated ');
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
                $res=Task::find($id)->delete();
                if($res)
                {
                    session()->flash('success','Task deleted sucessfully');
                }
                else
                {
                    session()->flash('error','Task not deleted ');
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
        $is_active=Task::find($id);

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
