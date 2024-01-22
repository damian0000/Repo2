<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'project_id',
        'user_id',
        'created_at',
        'updated_at',
        'is_delete'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
