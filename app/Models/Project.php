<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'created_at',
        'updated_at',
        'is_delete',
        'company_id'
    ];
    public function projectUsers()
    {
        return $this->hasMany(ProjectUser::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}