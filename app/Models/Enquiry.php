<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
     protected $fillable = [
        'name',
        'email',
        'mobile',
        'designation',
        'company_name',
        'message',
    ];

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('d-m-y'),
        );
    }
}
