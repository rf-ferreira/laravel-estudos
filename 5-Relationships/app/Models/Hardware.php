<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hardware extends Model
{
    use HasFactory;

    protected $table = "hardwares";

    protected $fillable = [
        'name',
        'price',
        'brand',
        'type'
    ];

    public function hardwareType()
    {
        return $this->hasOne(HardwareType::class, 'id', 'type');
    }

    public function hardwareBrand()
    {
        return $this->hasOne(HardwareBrand::class, 'id', 'brand');
    }
}
