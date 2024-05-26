<?php

namespace App\Models;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}