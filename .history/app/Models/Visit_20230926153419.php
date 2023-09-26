<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = [
        'assistant_id',
        'patient_id',
        'service_id',
        'from_patient_id',
        'tavel_time',
        'service_date',
        'service_start_time',
        'service_end_time',
        'description',
        'isDelete',
        'created_at',
        'updated_at'
    ];

    public function assistant()
    {
        return $this->belongsTo(User::class, 'assistant_id');
    }
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
    public function fromPatient()
    {
        return $this->belongsTo(User::class, 'from_patient_id');
    }
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}