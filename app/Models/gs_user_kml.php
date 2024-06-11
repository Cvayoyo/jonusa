<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gs_user_kml extends Model
{
    use HasFactory;
    protected $table = 'gs_user_kml';
    protected $fillable = [
        'kml_id',
        'user_id',
        'name',
        'active',
        'desc',
        'kml_file',
        'file_name',
        'file_size'
    ];
}
