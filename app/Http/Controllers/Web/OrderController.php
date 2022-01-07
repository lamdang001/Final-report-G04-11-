<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function pay(Request $request)
    {
        $customers = [];
        $data = $request->all();
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'schedule_id' => $data['choose'],
            'total' => $data['total'],
            'type' => $data['bank-type']
        ]);
        foreach ($data['card-customer'] as $key => $value) {
            $customers[$key]['card'] = $value;
        }
        foreach ($data['name-customer'] as $key => $value) {
            $customers[$key]['name'] = $value;
        }
        foreach ($data['place-customer'] as $key => $value) {
            $customers[$key]['place'] = $value;
        }
        foreach ($data['phone-customer'] as $key => $value) {
            $customers[$key]['phone'] = $value;
        }
        foreach ($data['birthday-customer'] as $key => $value) {
            $customers[$key]['birthday'] = $value;
        }
        foreach ($data['slot'] as $key => $value) {
            $customers[$key]['slot'] = $value;
        }
        foreach ($data['type'] as $key => $value) {
            $customers[$key]['type'] = $value;
        }
        foreach ($customers as $customer) {
            OrderDetail::create([
                'order_id' => $order->id,
                'identity_card' => $customer['card'],
                'name' => $customer['name'],
                'place'=> $customer['place'],
                'birthday' => $customer['birthday'],
                'phone' => $customer['phone'],
                'slot' => $customer['slot'],
                'type' => $customer['type']
            ]);
        }
        $schedule = Schedule::find($data['choose']);
        Schedule::where('id',$data['choose'])->update(['qty' => $schedule['qty'] - count($customers)]);
        Schedule::where('id',$data['choose'])->update(['qty_buy' => $schedule['qty_buy'] + count($customers)]);
        return redirect()->route('web.orders',['id' => Auth::user()->id])->with('success','Đặt vé thành công, vui lòng kiểm tra thông tin của bạn');
    }

    public function showMyOrders($id) {
        $orders = Order::join('schedules','schedule_id','=','schedules.id')
        ->join('users','user_id','=','users.id')
        ->where('user_id',$id)->get(['orders.*','schedules.name','users.name','users.email','users.phone']);
        return view('web.orders',['orders' => $orders]);
    }

    public function showEditOrderForm($id) {
        $order = Order::find($id);
        $order_details = OrderDetail::where('order_id',$id)->get();
        return view('web.edit_order',['order' => $order, 'order_details' => $order_details]);
    }

    public function handleEditOrder(Request $request, $id) {
        $customers = [];
        $data = $request->all();
        foreach ($data['order-id-customer'] as $key => $value) {
            $customers[$key]['order_detail_id'] = $value;
        }
        foreach ($data['card-customer'] as $key => $value) {
            $customers[$key]['card'] = $value;
        }
        foreach ($data['name-customer'] as $key => $value) {
            $customers[$key]['name'] = $value;
        }
        foreach ($data['place-customer'] as $key => $value) {
            $customers[$key]['place'] = $value;
        }
        foreach ($customers as $customer) {
            $order_detail = OrderDetail::find($customer['order_detail_id']);
            $order_detail->identity_card = $customer['card'];
            $order_detail->name = $customer['name'];
            $order_detail->place = $customer['place'];
            $order_detail->save();
            return redirect()->route('web.order.detail',['id' => $id])->with('success','Cập nhật thành công');
        }
    }

    public function showOrderDetail($id)
    {
        $orders = OrderDetail::where('order_id',$id)->get();
        return view('web.order_detail',compact('orders'));
    }

    public function cancleOrder($id)
    {
        $order = Order::find($id);
        $order->status = 2;
        $order->save();
        return redirect()->route('web.orders',['id' => Auth::user()->id])->with('success','Hủy đơn hàng thành công');
    }
}
