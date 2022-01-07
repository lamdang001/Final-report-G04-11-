<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $revenue_ticket = DB::select(
            'SELECT SUM(total) total, orders.created_at, schedule_id, qty_buy FROM orders, schedules WHERE schedule_id = schedules.id AND status = 1 GROUP BY schedule_id'
        );
        $revenue_year = DB::select(
            'SELECT SUM(total) total, COUNT(*) count_schedule, MONTH(orders.created_at) order_month, YEAR(orders.created_at) order_year, qty_buy FROM orders, schedules WHERE schedule_id = schedules.id AND status = 1 GROUP BY order_month'
        );
        return view('admin.dashboard.index', compact('revenue_ticket', 'revenue_year'));
    }
}
