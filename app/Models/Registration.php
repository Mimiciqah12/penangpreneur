<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'full_name',
        'phone_number',
        'email',
        'agency_name',
        'business_category',
        'product_name',
        'product_image',
        'product_description',
        'reference_number',
    ];
}