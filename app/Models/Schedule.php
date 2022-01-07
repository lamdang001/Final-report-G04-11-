<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = 
    [
        'qty',
        'qty_buy',
        'price',
        'start_airport',
        'end_airport',
        'date',
        'time',
        'time_stop',
        'slot_1',
        'slot_2',
        'name'
    ];
    protected $table = "schedules";
}
