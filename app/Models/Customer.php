<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;

    protected $fillable = [
        'customer_id',
    ];

    public function Transaction()
    {
        return $this->hasMany(Transaction::class, 'customer_id', 'id');
    }
}
