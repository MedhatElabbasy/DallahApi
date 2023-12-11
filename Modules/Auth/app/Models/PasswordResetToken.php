<?php

namespace Modules\Auth\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResetToken extends Model
{
    use HasFactory;

    protected $primaryKey = 'email';

    protected $fillable = [
        'email',
        'phone',
        'token',
        'created_at',
    ];

    protected $dates = [
        'created_at',
    ];
}
