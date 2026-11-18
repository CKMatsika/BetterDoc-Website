<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'organisation', 'email', 'phone', 'industry', 'size',
        'message', 'ip_address', 'status', 'contacted_at',
    ];

    protected $casts = [
        'contacted_at' => 'datetime',
    ];
}
