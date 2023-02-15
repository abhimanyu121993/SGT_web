<?php

namespace App\Http\Controllers\customer;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\customer\Checkpoint;
use App\Models\customer\Property;
use App\Models\customer\Route;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $property = Property::where('owner_id', Helper::getOwner())->get();
        return view('customer.route.create_route', compact('property'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //For show (Register property) page.
    public function create()
    {
        $routes = Route::where('owner_id', Helper::getOwner())->get();
        return view('customer.Route.manage_Route', compact('routes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //For store data in Route table.

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'time' => 'required',

        ]);

        try {
            $images = '';
            if($request->hasFile('images'))
            {
                $images='Checkpoint-'.time().'-'.rand(0,99).'.'.$request->images->extension();
                $request->images->move(public_path('upload/route/'),$images);
                $images = 'upload/route/'.$images;
            }
            $res= Route::create([
                'property_id'=>$request->property_id,
               'name'=>$request->name,
               'desc'=>$request->description,
               'file'=>$images,
               'color'=>$request->color,
               'complition_time'=>$request->time,
               'is_active'=>1,
           ]);
         if ($res) {
          Session::flash('success', 'Route created successfully');
        } else {
          Session::flash('error', 'Route not created');
         }
           
        } catch (Exception $ex) {

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
        $id = Crypt::decrypt($id);
        $route = Route::find($id);
        if ($route) {
            return view('customer.Route.create_route', compact('route'));
        } else {
            Session::flash('error', 'Something Went Wrong OR Data is Deleted');
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
            'name' => 'required',
            'time' => 'required',

        ]);
        if($request->hasFile('images'))
        {
            $image='route-'.time().'-'.rand(0,99).'.'.$request->images->extension();
            $request->images->move(public_path('upload/route/'),$image);
            $oldimage=Route::find($id)->pluck('file')[0];
            File::delete(public_path($oldimage));
            Route::find($id)->update(['file'=>'upload/route/'.$image]);
        }
        try {
            $res = Route::find($id)->update([
                'property_id'=>$request->property_id,
                'name'=>$request->name,
                'desc'=>$request->description,
                'color'=>$request->color,
               'complition_time'=>$request->time,
            ]);
            if ($res) {
                session()->flash('success', 'Route updated sucessfully');
            } else {
                session()->flash('error', 'Route not updated ');
            }
        } catch (Exception $ex) {
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
    //For deleting the data from property table.

    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        try {
            $res = Route::find($id)->delete();
            if ($res) {
                session()->flash('success', 'Route deleted sucessfully');
            } else {
                session()->flash('error', 'Route not deleted ');
            }
        } catch (Exception $ex) {
            Helper::handleError($ex);
        }
        return redirect()->back();
    }

    //For change the status of Isactive.
    public function is_active($id)
    {
        $is_active = Route::find($id);

        if ($is_active->is_active == 1) {
            $is_active->is_active = 0;
        } else {
            $is_active->is_active = true;
        }
        if ($is_active->update()) {
            return 1;
        } else {
            return 0;
        }
    }
    //Fetch checkpoint by property.
    public function checkpoint_in_property(Request $request)
    {
        $request->validate([
            'property_id' => 'required|numeric'
        ]);
        $checkpoint = Helper::getCheckpointByProperty($request->property_id); //Fetch checkpoint by property from helper.
        $html = '';
        $html .= "<option value=''>--Select Checkpoint</option>";
        foreach ($checkpoint as $check) {
            $html .= "<option value='" . $check->id . "'>" . $check->name . "</option>";
        }
        return $html;
    }
    public function show_route($id)
    {

        $checkpoints = Checkpoint::where('property_id', $id)->get();
        $property_id = $id;
        $routes = Route::where('property_id', $id)->get();
        return view('customer.route.create_route', compact('checkpoints', 'property_id', 'routes'));
    }
}
