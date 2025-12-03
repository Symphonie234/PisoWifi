<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Voucher extends Model
{
    protected $fillable = [
        'code',
        'duration_minutes',
        'expires_at',
        'used_at',
    ];

    protected $dates = [
        'expires_at',
        'used_at',
    ];

    public function isExpired()
    {
        if ($this->expires_at === null) return false;
        return $this->expires_at->lt(now());
    }
}
