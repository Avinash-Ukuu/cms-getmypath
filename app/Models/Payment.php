<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
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

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('d-m-y'),
        );
    }
}
