<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Order;

class HomeController extends Controller
{
    /**
     * Display index page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('web.index');
    }

    /**
     * Display home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $schedules = Schedule::all();
        return view('web.home',['schedules' => $schedules]);
    }

    /**
     * Search schedule
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        if($request->ajax()) {
            $schedule = Schedule::find($request->schedule);
            return response()->json([
                'status' => 200,
                'data'   =>  view('web.includes.home.step1', compact('schedule'))->render()
            ]);
        }
    }

    /**
     * Continue second
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function continueSecond(Request $request)
    {
        if($request->ajax()) {
            $qty_customer = $request->qty;
            return response()->json([
                'status' => 200,
                'data'   =>  view('web.includes.home.step2', compact('qty_customer'))->render()
            ]);
        }
    }

    /**
     * Continue third
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function continueThird(Request $request)
    {
        if($request->ajax()) {
            $customers = [];
            $slots = Order::join('order_details','order_id','=','orders.id')->where('schedule_id',$request->schedule)->pluck('slot')->toArray();
            $schedule = Schedule::find($request->schedule);
            $name_customer_arr = $request->name_customer_arr;
            $birthday_customer_arr = $request->birthday_customer_arr;
            foreach ($name_customer_arr as $key => $value) {
                $customers[$key]['name'] = $value;
            }
            foreach ($birthday_customer_arr as $key => $value) {
                $birthDate = explode("-", $value);
                $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
                    ? ((date("Y") - $birthDate[0]) - 1)
                    : (date("Y") - $birthDate[0]));
                if ($age < 8) {
                    $customers[$key]['type'] = 'Trẻ em (dưới 8 tuổi)';
                } else {
                    $customers[$key]['type'] = 'Người lớn (từ 8 tuổi trở lên)';
                }
            }
            return response()->json([
                'status' => 200,
                'data'   =>  view('web.includes.home.step3', compact('customers', 'schedule', 'slots'))->render()
            ]);
        }
    }

    /**
     * Continue fourth
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function continueFourth(Request $request)
    {
        if($request->ajax()) {
            $total = 0;
            $schedule = Schedule::find($request->schedule);
            $birthday_customer_arr = $request->birthday_customer_arr;
            $slot_customer_arr = $request->slot_customer_arr;
            foreach ($birthday_customer_arr as $key => $value) {
                $birthDate = explode("-", $value);
                $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md")
                    ? ((date("Y") - $birthDate[0]) - 1)
                    : (date("Y") - $birthDate[0]));
                if ($age < 8) {
                    $total += 0;
                } else {
                    foreach ($slot_customer_arr as $slot) {
                        if (strpos('V', $slot) || strpos('v', $slot)) {
                            $total += $schedule->price * 1.05;
                        } else {
                            $total += $schedule->price;
                        }
                    }
                }
            }
            return response()->json([
                'status' => 200,
                'data'   =>  view('web.includes.home.step4', compact('total', 'schedule'))->render()
            ]);
        }
    }
}
