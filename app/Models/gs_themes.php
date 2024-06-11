<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gs_themes extends Model
{
    use HasFactory;
    protected $table = 'gs_themes';
    protected $fillable = [
        'theme_id',
        'name',
        'active',
        'theme',
    ];
}
