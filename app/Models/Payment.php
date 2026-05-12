<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
         'name',
        'email',
        'phone',
        'course_name',
        'course_mode',
        'batch_type',
        'batch_start',
        'batch_duration',
        'batch_time',
        'batch_days',
        'country',
        'currency',
        'gateway',
        'transaction_id',
        'amount',
        'status',
        'response',
    ];

    protected $casts = [
        'response' => 'array',
    ];
}
