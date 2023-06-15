<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;use Illuminate\Support\Facades\DB;
use Psy\Util\Str;


class purchaseOrder extends Model
{
    use HasFactory;

    protected $table = "purchase_order";

    public function storePo($data):bool{
        $this->table = "purchase_order";
        $this->fillable = ['uuid_po', 'uuid_supplier', 'uuid_outlet', 'created_by','created_date',"order_number"];
        $this->uuid_po = $data['uuid'];
        $this->uuid_supplier = $data['supplier'];
        $this->created_date = $data['tanggal'];
        $this->created_by = $data['created_by'];
        $this->total= $data['total'];
        $this->notes = $data['notes'];
        $this->uuid_outlet = $data['outlet'];
        $this->order_number = "#23050001";
        try {
            $this->save();
            return true;
        } catch (\Illuminate\Database\QueryException $e) {
            return($e->getMessage());
        }

    }

    public function storePoDetail($data){
        $this->table = "purchase_order_detail";
        $this->fillable = ['uuid_po_detail', 'uuid_po', 'item', 'item_price','qty'];
        $this->uuid_po_detail =\Illuminate\Support\Str::uuid();
        $this->uuid_po = $data['uuid'];
        $this->created_date = $data['tanggal'];
        $this->created_by = $data['created_by'];
        $this->total= $data['total'];
        $this->notes = $data['notes'];
        $this->uuid_outlet = $data['outlet'];
    }


}
