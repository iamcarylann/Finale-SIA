<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Define fillable fields
    protected $fillable = [
        'customer_name',
        'customer_email',
        // Add other fillable fields as needed
    ];
    public function product()
{
    return $this->belongsTo(Product::class);
}
}