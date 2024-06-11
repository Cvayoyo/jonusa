<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gs_user_object_groups extends Model
{
    use HasFactory;
    protected $table = 'gs_user_object_groups';
    protected $fillable = [
        'group_id',
        'user_id',
        'group_name',
        'group_desc',
    ];
    public function userObjects()
    {
        return $this->hasMany(gs_user_object::class, 'group_id', 'group_id');
    }
}
