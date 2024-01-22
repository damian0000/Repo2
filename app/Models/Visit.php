<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Visit extends Model
{
    protected $fillable = [
        'tavel_time',
        'date_visit',
        'start_time_visit',
        'end_time_visit',
        'description_visit',
        'additional_notes',
        'is_delete',
        'created_at',
        'updated_at'
    ];

    public function visitUsers()
    {
        return $this->hasMany(VisitUser::class);
    }
    
    // public function assistant()
    // {
    //     return $this->belongsTo(User::class, 'assistant_id');
    // }
    // public function patient()
    // {
    //     return $this->belongsTo(User::class, 'patient_id');
    // }
    // public function prevPatient()
    // {
    //     return $this->belongsTo(User::class, 'from_patient_id');
    // }
}
