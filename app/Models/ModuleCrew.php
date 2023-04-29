<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleCrew extends Model
{
    public $timestamps = false; 

    protected $table = 'module_crew';
    
    protected $primaryKey = 'id';
    
    protected $fillable = ['ship_module_id','nick','gender','age'];
    
    public function getAllModuleCrew(){
        return ModuleCrew::all();
       }
    
       public function findModuleCrew($id){
        return ModuleCrew::find($id);
       }
}
