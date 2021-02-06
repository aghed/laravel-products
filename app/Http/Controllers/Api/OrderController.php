<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return Order::with('customer')->get();
    }

    public function show($id)
    {
        $order= Order::with('orderItems')->with('orderItems.product:id,product_name,unit_price')->findOrFail($id);
        

        return $order;
    }

    public function store(OrderRequest $request)
    {
        $total=0;
        $items=$request->items;

        foreach ($items as $item) {
            $item_price=$item['price'] * $item['quantity'];
            $total+=$item_price; 
        }

        $order=Order::create([
            'customer_id'=>$request->customer_id,
            'order_date'=>date_create_from_format('Y-m-d',$request->order_date),
            'order_number'=>'10',
            'total_amount'=>$total
        ]);

        foreach ($items as $item) {
            $order->orderItems()->create([
                'product_id'=>$item['id'],
                'unit_price'=>$item['price'],
                'quantity'=>$item['quantity']
            ]);
        }

        return response()->json('created',200);
    }

    public function update($id,OrderRequest $request)
    {
        $order=Order::findOrFail($id);
        $total=0;
        $items=$request->items;
        //delete all old items
        $order->orderItems()->delete();

        foreach ($items as $item) {
            $item_price=$item['price'] * $item['quantity'];
            $total+=$item_price; 

            $order->orderItems()->create([
                'product_id'=>$item['id'],
                'unit_price'=>$item['price'],
                'quantity'=>$item['quantity']
            ]);

        }

        $order->update([
            'customer_id'=>$request->customer_id,
            'order_date'=>date_create_from_format('Y-m-d',$request->order_date),
            'order_number'=>'10',
            'total_amount'=>$total
        ]);
        return response()->json('updated',200);

    }

    public function destroy($id)
    {
        $order=Order::findOrFail($id);
        $order->delete();
        return response()->json('deleted',200);
    }
}

