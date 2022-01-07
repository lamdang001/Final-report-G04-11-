<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = 
    [
        'order_id',
        'identity_card',
        'name',
        'place',
        'birthday',
        'type',
        'phone',
        'slot'
    ];
    protected $table = "order_details";
}
