<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModuleCrew;

class ModuleCrewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myModuleCrews = ModuleCrew::all();

        return view('modulecrew.list',['module_crew' => $myModuleCrews, ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("modulecrew.add");
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
            'ship_module_id' => 'required',
            'nick' => 'required|min:3|max:10',
            'gender' => 'required',
            'age' => 'required',
        ]);

        if($validated){
            $mod_ship = new ModuleCrew();
            $mod_ship->ship_module_id = $request->ship_module_id;
            $mod_ship->nick = $request->nick;
            $mod_ship->gender = $request->gender;
            $mod_ship->age = $request->age;
            $mod_ship->save();
            return redirect('/modulecrew/list');
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
        $myModuleCrew = ModuleCrew::find($id);
        if($myModuleCrew == null){
            $error_message = "Module crew id=".$id." not found";
            return view('modulecrew.message',['message'=>$error_message,'type_of_message'=>'Error']);
        }
        if($myModuleCrew->count() > 0){
            return view('modulecrew.show',['modulecrew' => $myModuleCrew,]);
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
        $myModuleCrew = ModuleCrew::find($id);
        if($myModuleCrew == null){
            $error_message = "Module crew id=".$id." not found";
            return view('modulecrew.message',['message'=>$error_message,'type_of_message'=>'Error']);
        }
        if($myModuleCrew->count() > 0){
            return view('modulecrew.show',['modulecrew' => $myModuleCrew,]);
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
        $validated = $request->validate([
            'ship_module_id' => 'required',
            'nick' => 'required|min:3|max:10',
            'gender' => 'required',
            'age' => 'required',
        ]);

        if($validated) {
            $mod_ship = ModuleCrew::find($id);

            if($mod_ship != null){
                $mod_ship->ship_module_id = $request->ship_module_id;
                $mod_ship->nick = $request->nick;
                $mod_ship->gender = $request->gender;
                $mod_ship->age = $request->age;
                $mod_ship->save();
                return redirect('/modulecrew/list');
            }
            else {
                $error_message = "Module crew id=".$id." not found";
                return view('modulecrew.message',['message'=>$error_message,'type_of_message'=>'Error']);
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
        $mod_ship = ModuleCrew::find($id);
        if($mod_ship != null){
            $mod_ship->delete();
            return redirect('/modulecrew/list');
        }
        else {
            $error_message = "Module crew id=".$id." not found";
            return view('modulecrew.message',['message'=>$error_message,'type_of_message'=>'Error']);
        }
    }
}
