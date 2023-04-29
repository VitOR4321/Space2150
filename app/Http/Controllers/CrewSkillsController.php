<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CrewSkills;

class CrewSkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myCrewSkills = CrewSkills::all();

        return view('crewskills.list',['crew_skills' => $myCrewSkills, ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("crewskills.add");
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
            'module_crew_id' => 'required',
            'name' => 'required|min:3|max:15',
        ]);

        if($validated){
            $mod_ship = new CrewSkills();
            $mod_ship->module_crew_id = $request->module_crew_id;
            $mod_ship->name = $request->name;
            $mod_ship->save();
            return redirect('/crewskills/list');
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
        $myCrewSkill = CrewSkills::find($id);
        if($myCrewSkill == null){
            $error_message = "Crew skills id=".$id." not found";
            return view('crewskills.message',['message'=>$error_message,'type_of_message'=>'Error']);
        }
        if($myCrewSkill->count() > 0){
            return view('crewskills.show',['crewskill' => $myCrewSkill,]);
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
        $myCrewSkill = CrewSkills::find($id);

        if($myCrewSkill == null) {
            $error_message = "Crew skills id=".$id." not found";
            return view('crewskills.message',['message'=>$error_message,'type_of_message'=>'Error']);
        }
        if($myCrewSkill->count() > 0){
            return view('crewskills.edit',['crewskill' => $myCrewSkill,]);
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
            'module_crew_id' => 'required',
            'name' => 'required|min:3|max:15',
        ]);

        if($validated) {
            $mod_ship = CrewSkills::find($id);

            if($mod_ship != null){
                $mod_ship->module_crew_id = $request->module_crew_id;
                $mod_ship->name = $request->name;
                $mod_ship->save();
                return redirect('/crewskills/list');
            }
            else {
                $error_message = "Crew skills id=".$id." not found";
                return view('crewskills.message',['message'=>$error_message,'type_of_message'=>'Error']);
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
        $mod_ship = CrewSkills::find($id);
        if($mod_ship != null){
            $mod_ship->delete();
            return redirect('/crewskills/list');
        }
        else {
            $error_message = "Crew skills id=".$id." not found";
            return view('crewskills.message',['message'=>$error_message,'type_of_message'=>'Error']);
        }
    }
}
