<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::join('schedules','schedule_id','=','schedules.id')
        ->join('users','user_id','=','users.id')
        ->get(['orders.*','schedules.name','users.name','users.email','users.phone']);
        return view('admin.orders.list',['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders = OrderDetail::where('order_id',$id)->get();
        return view('admin.orders.show', compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        OrderDetail::where('order_id',$id)->delete();
        Order::find($id)->delete();
        return redirect()->route('order.list')->with('success','Xóa đơn hàng thành công');
    }

    /**
     * Update status order
     *
     * @param  int  $id
     * @param  int  $status
     * @return \Illuminate\Http\Response
     */
    public function updateStatus($status, $id) {
        $order = Order::find($id);
        $order->status = $status;
        $order->save();
        if ($status == 2) {
            return redirect()->route('order.list')->with('success','Hủy đơn hàng thành công');
        } else {
            return redirect()->route('order.list')->with('success','Xác nhận đơn hàng thành công');
        }
    }
}
