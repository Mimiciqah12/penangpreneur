<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    // Saya telah tambahkan address, premises_address, dan premises_image
    protected $fillable = [
        'full_name',
        'phone_number',
        'email',
        'agency_name',
        'business_category',
        'product_name',
        'address',             
        'premises_address',    
        'product_image',
        'premises_image',      
        'product_description',
        'reference_number',
    ];
}