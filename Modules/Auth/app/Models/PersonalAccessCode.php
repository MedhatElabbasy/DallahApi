<?php

namespace Modules\Auth\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalAccessCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'user_id',
        'action',
        'expires_at'
    ];
}
