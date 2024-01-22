<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountHoursYear extends Model
{
      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'assistant_id',
        'patient_id',
        'project_id',
        'month',
        'hours',
        'year',
        'created_at',
        'updated_at',
        'is_delete'

    ];

    public function assistant()
    {
        return $this->belongsTo(User::class, 'assistant_id');
    }
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
