<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ModuleCrew;

class ModuleCrewSeeder extends Seeder
{
    public function run()
    {
    DB::table('module_crew')->insert([
    ['ship_module_id' =>1,'nick'=>'Wale', 'gender' =>'M', 'age' =>24], 
    ['ship_module_id' =>2,'nick'=>'Nina', 'gender' =>'F', 'age' =>26], 
    ['ship_module_id' =>3,'nick'=>'Staffe', 'gender' =>'M', 'age' =>28], 
    ]);
    }
}
