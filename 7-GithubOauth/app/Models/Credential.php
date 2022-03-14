<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credential extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "service",
        "service_id",
        "service_login",
        "access_token"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
