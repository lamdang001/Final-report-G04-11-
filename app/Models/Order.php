<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = 
    [
       'schedule_id',
       'user_id',
       'staff_id',
       'total',
       'type',
       'status'
    ];
    protected $table = "orders";
}
