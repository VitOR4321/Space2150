<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\CrewSkills;

class CrewSkillsSeeder extends Seeder
{
    public function run()
 {
 DB::table('crew_skills')->insert([
 ['module_crew_id' =>1,'name'=>'Julek'],  
 ['module_crew_id' =>2,'name'=>'Karolina'], 
 ['module_crew_id' =>3,'name'=>'Marek'], 
 ]);
 }
}
