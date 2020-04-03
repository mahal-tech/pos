<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PurchaseReceipt;
use App\Purchase;
use App\Bulkstock;
use App\Models\Product;
class OtherController extends Controller
{
    public function purchaselisting()
    {
    	return view("admin.purchaselisting");
    }

    public function recepts()
    {
    	return response(PurchaseReceipt::with('supplier')->get());
    }

    public function allproductbelogntopurchase($id)
    {
    	return response(Purchase::with('product')->where('purchase_receipt_id',$id)->get());
    }

    public function products($query='')
    {
    	return response(Product::where('name','like','%'.$query.'%')->get());
    }

    public function createlisting(Request $request)
    {
    	$purchase = new Purchase();
    	$purchase->purchase_receipt_id =$request->purchase_receipt_id;
    	$purchase->product_id =$request->product_id;
    	$purchase->quantity =$request->quantity;
    	$purchase->total_buy_price =$request->total_buy_price;
    	$purchase->unit_buy_price =$request->unit_buy_price_purchase;
    	$purchase->general_unit_sale_price =$request->general_sale_price;
    	$purchase->unit_sale_price =$request->general_sale_price;
    	$purchase->expire_date =date("Y-m-d");
    	$purchase->save();
    	$stock=Bulkstock::find($request->product_id);

		$quantity=$request->quantity;
		$unit_buy_price_purchase=$request->unit_buy_price_purchase;
		$exclusive_sale_price=$request->general_sale_price;
		$general_sale_price=$request->general_sale_price;

    	if($stock){
			$oldquantity=$alddata->stock_amount;
			$totalquantity=$quantity+$oldquantity;
			$unit_buy_price_purchase1=(($alddata->bulk_unit_buy_price*$oldquantity)+($unit_buy_price_purchase*$quantity))/($oldquantity+$quantity);
			$exclusive_sale_price1=(($alddata->bulk_unit_sale_price*$oldquantity)+($exclusive_sale_price*$quantity))/($oldquantity+$quantity);
			$general_unit_sale_price1=(($alddata->general_unit_sale_price*$oldquantity)+($general_sale_price*$quantity))/($oldquantity+$quantity);
			$stock->amount=$totalquantity;
			$stock->bulk_unit_buy_price=$unit_buy_price_purchase1;
			$stock->bulk_unit_sale_price=$exclusive_sale_price1;
			$stock->general_unit_sale_price=$general_unit_sale_price1;
			$stock->last_buy_price=$request->total_buy_price;
			$stock->update();
		}else{
			Bulkstock::create([
				'amount'=>$quantity,
				'product_id'=>$request->product_id
				'shop_id'   => 1,
				'bulk_unit_buy_price'=>$unit_buy_price_purchase,
				'bulk_unit_sale_price'=>$exclusive_sale_price,
				'general_unit_sale_price'=>$general_sale_price,
				'bulk_alarming_stock'=>100,
				'last_buy_price'=>$request->total_buy_price;
			]);
		}
    	
    	return response(Purchase::with('product')->where('purchase_receipt_id',$request->purchase_receipt_id)->get());
    }
}