<?php

namespace App\Models;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchasingModel extends Model
{
    use HasFactory;
    protected $table;
    protected $fillable=[];

    public function createSupplier(array $data){
    $this->table="supplier";
    $this->fillable =['uuid','supplier_name','phone_number','supplier_email','supplier_address','city','zip','state'];
    $this->uuid = $data['uuid'];
    $this->supplier_name = $data['supplierName'];
    $this->phone_number = $data['supplierPhone'];
    $this->supplier_email = $data['supplierEmail'];
    $this->supplier_address = $data['supplierAddress'];
    $this->city = $data['supplierCity'];
    $this->state = $data['supplierState'];
    $this->zip = $data['supplierZip'];

        try {
            $this->save();
        } catch (\Illuminate\Database\QueryException $e) {
            return($e->getMessage());
        }

    }

    public function debug(array $data){
        return var_dump($data);
    }


}
