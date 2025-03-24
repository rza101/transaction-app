<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionFactory> */
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'fleet_id',
        'started_at',
        'ended_at',
        'status',
        'base_price',
        'total_price',
    ];

    public function Customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function Fleet()
    {
        return $this->belongsTo(Fleet::class, 'fleet_id', 'id');
    }
}
