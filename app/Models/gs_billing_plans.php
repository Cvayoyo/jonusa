<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gs_billing_plans extends Model
{
    use HasFactory;
    protected $table = 'gs_billing_plans';
    protected $fillable = [
        'plan_id',
        'name',
        'active',
        'objects',
        'period',
        'period_type',
        'price',
    ];
}
