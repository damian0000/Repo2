<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolesUser extends Model
{
    $table = 'roles_users';
    protected $fillable = [
        'role_id',
        'user_id'
    ];
}