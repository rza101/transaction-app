<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fleet extends Model
{
    /** @use HasFactory<\Database\Factories\FleetFactory> */
    use HasFactory;

    protected $fillable = [
        'license_number',
        'name',
    ];

    public function Transaction()
    {
        return $this->hasMany(Transaction::class, 'fleet_id', 'id');
    }
}
