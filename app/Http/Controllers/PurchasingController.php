<?php

namespace App\Http\Controllers;

use App\Models\purchaseOrder;
use App\Models\purchasingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PHPUnit\Exception;
use function Sodium\randombytes_uniform;


class PurchasingController extends Controller
{
    public function supplier(Request $request)
    {
        // Mendapatkan data dari tabel suppliers menggunakan Eloquent ORM
        $suppliers = purchasingModel::orderBy('created_at','DESC')->select('uuid','supplier_name','supplier_email','supplier_address','phone_number')->get();

        $countSupplier = $suppliers->count();

        if($countSupplier==0){
            $data = null;
        }

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
        $purchaseOrders = purchaseOrder::orderBy("created_at","DESC")->select("uuid_po","uuid_supplier","uuid_outlet","order_number","created_by","created_date","total","notes")->get();
        $countPurchaseOrder = $purchaseOrders->count();
        if($countPurchaseOrder==0){
            $data = null;
        }
        foreach ($purchaseOrders as $purchaseOrder) {
            $datas[] =
                [
                    "uuid" =>$purchaseOrder['uuid_po'],
                    "supplier" =>$purchaseOrder['uuid_supplier'],
                    "order_number" =>"#23050001",
                    "total" =>"Rp. ". number_format($purchaseOrder['total'], 0, ',', '.'),
                    "date" =>$purchaseOrder['created_date'],
                    "status"=>"Created"
                ];
        }
        return view('purchasing.purchasing-purchase-order', compact("datas"));
    }

    public function createPo(Request $request)
    {
        //get data supplier
        $suppliers = DB::table("supplier")->select('supplier_name','uuid')->get(true)->toArray();
        $datas =[];
        foreach ($suppliers as $supplier){
            $datas[] =[
                "supplier" =>[
                    "supplierName"=>$supplier->supplier_name,
                    ],
            ];


        }



        return view('purchasing.purchasing-create-po',compact('datas'));
    }

    public function storePurchaseOrder(){
        $uuid = Str::uuid();
        $tanggal = $_POST['tanggal'];
        $outlet = $_POST['outlet'];
        $supplier = $_POST['supplier'];
        $notes = $_POST['note'];
        $total = $_POST['total'];
        $items = $_POST['item_po'];
        $created_by = "Admin";
        $data = [
            "uuid"=>$uuid,
           "tanggal"=>$tanggal,
           "outlet"=>$outlet,
           "supplier"=>$supplier,
           "notes"=>$notes,
            "total"=>$total,
            "item"=>$items,
            "created_by"=>$created_by,
        ];

        $purchase_order = new purchaseOrder();
        $result_po = $purchase_order->storePo($data);
        foreach ($items as $item){
            $uuid_po_detail = Str::uuid();
            try {
                $item_name = $item['name'];
                $item_price = intval(str_replace(".","",$item['price']));
                DB::table('purchase_order_detail')->insert([
                    'item'=>$item_name,
                    'uuid_po_detail'=>$uuid_po_detail,
                    'uuid_po'=>$uuid,
                    'item_price'=>$item_price,
                    'order'=>$item['order'],
                    'stock'=>$item['stock'],
                    'unit'=>$item['unit'],

                ]);
                 $result_po_detail = true;
            }catch (\Illuminate\Database\QueryException $e){
                echo $e->getMessage();
                $result_po_detail = false;
            }

        }

        $result = ($result_po==true || $result_po_detail==true)?true:false;
        return $result;

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
