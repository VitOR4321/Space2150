<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipModules extends Model
{
// jeśli nie prowadzimy informacji timestamps 
// to należy zadeklarować to w modelu
public $timestamps = false; 
//Nazwa tabeli powiązanej z modułem
protected $table = 'ship_modules';
//Klucz główny
protected $primaryKey = 'id';
//Pola, które mogą być wypełniane masowo
protected $fillable = ['module_name','is_workable'];
// dodatkowa metoda odczytująca załogantów 
// dla danego modułu 
public function moduleCrew(){
return $this->hasMany(ModuleCrew::class);
 }
 public function getAllShipModules(){
    return ShipModules::all();
   }

   public function getAllWorkingShipModules(){
    return ShipModules::all()->where('is_workable', 1);
   }

   public function findModule($id){
    return ShipModules::find($id);
   }

}

