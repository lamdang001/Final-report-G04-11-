<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Order;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::all();
        return view('admin.schedules.list',['schedules' => $schedules]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.schedules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'start_airport' => 'required',
            'end_airport' => 'required',
            'date' => 'required',
            'time' => 'required',
            'time_stop' => 'required',
            'slot_1' => 'required',
            'slot_2' => 'required'
        ]);
        $data = $request->all();
        $slot_1 = rtrim($data['slot_1'], ',');
        $slot_2 = rtrim($data['slot_2'], ',');
        if ($data['qty'] == count(explode(',', $slot_1)) + count(explode(',', $slot_2))) {
            Schedule::create([
                'name' => $data['name'],
                'qty' => $data['qty'],
                'price' => $data['price'],
                'start_airport' => $data['start_airport'],
                'end_airport' => $data['end_airport'],
                'date' => $data['date'],
                'time' => $data['time'],
                'time_stop' => $data['time_stop'],
                'slot_1' => json_encode(explode(',', $slot_1)),
                'slot_2' => json_encode(explode(',', $slot_2))
            ]);
            return redirect()->route('schedule.list')->with('success','Thêm chuyến bay thành công');
        } else {
            return redirect()->back()->withInput()->with('invalid','Số lượng vé và số lượng chỗ ngồi phải bằng nhau');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $schedule = Schedule::find($id);
        $slots = Order::join('order_details','order_id','=','orders.id')->where('schedule_id',$id)->pluck('slot')->toArray();
        return view('admin.schedules.show', ['schedule' => $schedule, 'slots' => $slots]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schedule=  Schedule::find($id);
        return view('admin.schedules.edit', ['schedule' => $schedule]);
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
        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'start_airport' => 'required',
            'end_airport' => 'required',
            'date' => 'required',
            'time' => 'required',
            'time_stop' => 'required',
            'slot_1' => 'required',
            'slot_2' => 'required'
        ]);
        $data = $request->all();
        $slot_1 = rtrim($data['slot_1'], ',');
        $slot_2 = rtrim($data['slot_2'], ',');
        $schedule=  Schedule::find($id);
        if ($data['qty'] == count(explode(',', $slot_1)) + count(explode(',', $slot_2))) {
            $schedule->name = $data['name'];
            $schedule->qty = $data['qty'];
            $schedule->price = $data['price'];
            $schedule->save();
            return redirect()->route('schedule.list')->with('success','Cập nhật chuyến bay thành công');
        } else {
            return redirect()->back()->withInput()->with('invalid','Số lượng vé và số lượng chỗ ngồi phải bằng nhau');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schedule=  Schedule::find($id);
        $schedule->delete();
        return redirect()->route('schedule.list')->with('success','Xóa lịch chuyến bay công');
    }
}
