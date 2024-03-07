<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssistantPatient extends Model
{
    protected $table = 'assistantpatients';
      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'assistant_id',
        'patient_id',
        'project_id',
        'is_delete',
        'created_at',
        'updated_at',
    ];

    public function assistant()
    {
        return $this->belongsTo(User::class, 'assistant_id');
    }

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
}
