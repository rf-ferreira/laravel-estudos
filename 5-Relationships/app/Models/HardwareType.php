<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HardwareType extends Model
{
    use HasFactory;

    protected $table = "hardware_types";

    public function hardwares()
    {
        return $this->hasMany(Hardware::class, 'type', 'id');
    }
}
