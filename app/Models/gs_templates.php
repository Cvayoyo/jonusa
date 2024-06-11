<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gs_templates extends Model
{
    use HasFactory;
    protected $table = 'gs_templates';
    protected $fillable = [
        'template_id',
        'name',
        'language',
        'subject',
        'message',
    ];
}
