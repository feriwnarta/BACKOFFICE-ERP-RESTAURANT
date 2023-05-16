<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class purchasingModel extends Model
{
    use HasFactory;
    protected $table="supplier";
    protected $fillable=[];

    public function createSupplier(array $data):bool
    {
        $this->table = "supplier";
        $this->fillable = ['uuid', 'supplier_name', 'phone_number', 'supplier_email', 'supplier_address', 'city', 'zip', 'state'];
        $this->uuid = $data['uuid'];
        $this->supplier_name = $data['supplierName'];
        $this->phone_number = $data['supplierPhone'];
        $this->supplier_email = $data['supplierEmail'];
        $this->supplier_address = $data['supplierAddress'];
        $this->city = $data['supplierCity'];
        $this->state = $data['supplierState'];
        $this->zip = $data['supplierZip'];
//    $this->save();
        if ($this->save() == true) {
            return true;
        } else {
            return false;
        }

//        try {
//            $this->save();
//        } catch (\Illuminate\Database\QueryException $e) {
//            return($e->getMessage());
//        }

    }

    public function getSupplier($id){
        $data = DB::table('supplier')->where('uuid',$id)->select("uuid","supplier_name","phone_number","supplier_email","supplier_address","city","state","zip")->get()->toArray();
        return $data;

    }


}
