<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequestLog extends Model
{
    protected $fillable = [
        'method',
        'path',
        'ip',
        'status_code',
        'x_owner'
    ];
}
