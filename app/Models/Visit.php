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
    
    public function assistant()
    {
        return $this->belongsToMany(User::class, 'visitusers', 'visit_id', 'assistant_id');
    }


    public function patient()
    {
        return $this->belongsToMany(User::class, 'visitusers', 'visit_id', 'patient_id');
    }
    public function prevPatient()
    {
        return $this->belongsToMany(User::class,  'visitusers', 'visit_id', 'from_patient_id');
    }
}
