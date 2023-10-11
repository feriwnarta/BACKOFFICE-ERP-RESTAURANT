<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;
use PHPUnit\Util\Exception;

class ingredientsModel extends Model
{
    use HasFactory;

    public function storeCategory($data)
    {
        $this->fillable = ['uuid_category', 'category_name', 'created_by'];
        $this->table = "category_ingredients";
        $this->uuid_category = Str::uuid();
        $this->category_name = $data['categoryName'];
        $this->created_by = $data['createdBy'];
        $result = ($this->save() == true) ? true : false;
        return $result;
        //        try {
        //            $this->save();
        //        }catch (QueryException $exception){
        //            return $exception->getMessage();
        //        }



    }
}
