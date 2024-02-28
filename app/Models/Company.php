<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
       /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'is_delete',
        'created_at',
        'updated_at'

    ];
    public function user()
    {
        return $this->hasMany(User::class, 'company_id');
    }

    public function project()
    {
        return $this->hasMany(Project::class, 'company_id');
    }

}
