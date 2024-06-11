<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gs_user_templates extends Model
{
    use HasFactory;
    protected $table = 'gs_user_templates';
    protected $fillable = [
        'template_id',
        'user_id',
        'name',
        'desc',
        'subject',
        'message'
    ];
}
