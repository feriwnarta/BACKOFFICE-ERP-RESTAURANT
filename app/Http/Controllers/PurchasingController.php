<?php

namespace App\Http\Controllers;

use App\Models\purchasingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class PurchasingController extends Controller
{
    public function supplier(Request $request)
    {
        // Mendapatkan data dari tabel suppliers menggunakan Eloquent ORM
        $suppliers = purchasingModel::orderBy('created_at','DESC')->select('uuid','supplier_name','supplier_email','supplier_address','phone_number')->get();

        foreach ($suppliers as $supplier) {
            $data[] =
                    [
                        "uuid" =>$supplier['uuid'],
                        'name' => $supplier->supplier_name,
                        'address' => $supplier->supplier_address,
                        'phone' => $supplier->phone_number,
                        'email' => $supplier->supplier_email,
                    ];

        }




        return view('purchasing.purchasing-supplier', compact('data'));
    }

    public function purchaseOrder(Request $request)
    {
        $data = [
            'po' => [
                [
                    'date' => 'Rabu,08 Des 2022',
                    'supplier' => 'PT Meat Supplier',
                    'order_no' => '#02030405',
                    'total' => '1.200.000',
                    'status' => 'Created',
                ]
            ]
        ];

        return view('purchasing.purchasing-purchase-order', $data);
    }

    public function createPo(Request $request)
    {
        return view('purchasing.purchasing-create-po');
    }

    public function detailPurchaseOrder(Request $request, string $id)
    {
        // panggil service yang mengambil detail data po berdasarkan id

        // dummy data
        $data = [
            'supplier_data' => [
                'name' => 'PT MEAT FRESH',
                'phone' => '+628123456789',
                'email' => 'meat.fresh@gmail.com',
                'address' => [
                    'street' => 'Ruko Golf Island, PIK',
                    'state' => 'Jakarta Utara',
                    'city' => 'Jakarta',
                    'zip' => '12647',
                ],
            ],
            'po_data' => [
                'po_number' => '#002376393',
                'create_at' => '12/08/2022 13:08',
                'create_by' => 'Miko',
                'email' => 'admin@gmail.com',
                'outlet' => 'Outlet 1',
                'phone' => '+62912xxxx',
                'address' => 'Rukan Beach View Boulevard, Jl. Pantai Indah Kapuk No.7, Daerah Khusus Ibukota Jakarta 14460',
                'status' =>  [
                    'At 12/08/2022 13:08 #002376393 is process',
                    'At 12/08/2022 13:15 #002376393 is created',
                ],
            ],
            'po_items' => [
                'ayam' => [
                    'unit' => 'ekor',
                    'in_stock' => '25',
                    'order' => '20',
                    'price' => '55.000',
                    'total' => '1.100.000'
                ],
                // ...
            ]
        ];

        return view('purchasing.purchasing-details-po', $data);
    }

    public function createSupplier(Request $request)
    {

        return view('purchasing.purchasing-create-supplier');
    }

    public function storeSupplier(Request $request){

        $uuid = Str::uuid();
        $supplierName = $request->supplierName;
        $supplierPhone = $request->phoneNumber;
        $supplierEmail = $request->supplierEmail;
        $supplierAddress = $request->supplierAddress;
        $supplierCity = $request->supplierCity;
        $supplierState = $request->supplierState;
        $supplierZip = $request->supplierZip;
        $data = [
            "uuid"=>$uuid,
            "supplierName"=>$supplierName,
            "supplierPhone"=>$supplierPhone,
            "supplierEmail"=>$supplierEmail,
            "supplierAddress"=>$supplierAddress,
            "supplierCity"=>$supplierCity,
            "supplierState"=>$supplierState,
            "supplierZip"=>$supplierZip,
        ];
        $storeSupplier = new purchasingModel();
        $response_message=$storeSupplier->createSupplier($data);
        echo $response_message;

    }

    public function detailSupplier($id){
        $supplier = DB::table('supplier')->where('uuid',"=",$id)->select("uuid","supplier_name","phone_number","supplier_email","supplier_address","city","state","zip")->get();

        $dataSupplier =[
            "supplierUuid"=>$supplier[0]->uuid,
            "supplierName"=>$supplier[0]->supplier_name,
            "supplierPhone"=>$supplier[0]->phone_number,
            "supplierEmail"=>$supplier[0]->supplier_email,
            "supplierAddress"=>$supplier[0]->supplier_address,
            "supplierCity"=>$supplier[0]->city,
            "supplierState"=>$supplier[0]->state,
            "supplierZip"=>$supplier[0]->zip,
        ];






        return view('purchasing.purchasing-detail-supplier',$dataSupplier);
    }

    public function updateSupplier(){
        $uuid = $_POST['uuid'];
        $supplierName= $_POST['supplierName'];
        $supplierPhone = $_POST['phoneNumber'];
        $supplierEmail = $_POST['supplierEmail'];
        $supplierAddress = $_POST['supplierAddress'];
        $supplierCity = $_POST['supplierCity'];
        $supplierState = $_POST['supplierState'];
        $supplierZip = $_POST['supplierZip'];

        $data =[
            "uuid"=>$uuid,
            "supplierName"=>$supplierName,
            "supplierPhone"=>$supplierPhone,
            "supplierEmail"=>$supplierEmail,
            "supplierAddress"=>$supplierAddress,
            "supplierCity"=>$supplierCity,
            "supplierState"=>$supplierState,
            "supplierZip"=>$supplierZip,
        ];



        $updateSupplier = new purchasingModel();
        $data=$updateSupplier->updateSupplier($data);
        $result = ($data == 1)?"Berhasil":"Gagal";
        echo json_encode($result,JSON_PRETTY_PRINT);
    }
}
