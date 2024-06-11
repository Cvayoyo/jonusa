<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gs_user_share_position extends Model
{
    use HasFactory;
    protected $table = 'gs_user_share_position';
    protected $fillable = [
        'share_id',
        'user_id',
        'active',
        'expire',
        'expire_dt',
        'delete_expired',
        'name',
        'email',
        'phone',
        'imei',
        'su',
    ];
}
