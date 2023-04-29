<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShipModules;

class ShipModulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myShipModules = ShipModules::all();

        return view('shipmodules.list',['ship_modules' => $myShipModules, ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("shipmodules.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'module_name' => 'required|min:3|max:25|unique:ship_modules',
            'is_workable' => 'required',
        ]);

        if($validated){
            $mod_ship = new ShipModules();
            $mod_ship->module_name = $request->module_name;
            $mod_ship->is_workable = $request->is_workable;
            $mod_ship->save();
            return redirect('/shipmodules/list');
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
        $myShipModule = ShipModules::find($id);
        if($myShipModule == null){
            $error_message = "Ship module id=".$id." not found";
            return view('shipmodules.message',['message'=>$error_message,'type_of_message'=>'Error']);
        }
        if($myShipModule->count() > 0){
            return view('shipmodules.show',['shipmodule' => $myShipModule,]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $myShipModule = ShipModules::find($id);

        if($myShipModule == null) {
            $error_message = "Ship module id=".$id." not found";
            return view('shipmodules.message',['message'=>$error_message,'type_of_message'=>'Error']);
        }
        if($myShipModule->count() > 0){
            return view('shipmodules.edit',['shipmodule' => $myShipModule,]);
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
        //
        $validated = $request->validate([
            'module_name' => 'required|min:3|max:25',
            'is_workable' => 'required',
        ]);

        if($validated) {
            $mod_ship = ShipModules::find($id);

            if($mod_ship != null){
                $mod_ship->module_name = $request->module_name;
                $mod_ship->is_workable = $request->is_workable;
                $mod_ship->save();
                return redirect('/shipmodules/list');
            }
            else {
                $error_message = "Ship module id=".$id." not found";
                return view('shipmodules.message',['message'=>$error_message,'type_of_message'=>'Error']);
            }
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
        $mod_ship = ShipModules::find($id);
        if($mod_ship != null){
            $mod_ship->delete();
            return redirect('/shipmodules/list');
        }
        else {
            $error_message = "Ship module id=".$id." not found";
            return view('shipmodules.message',['message'=>$error_message,'type_of_message'=>'Error']);
        }
    }
}
