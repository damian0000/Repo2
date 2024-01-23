<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitUser extends Model
{
    protected $table = 'visitusers';

    protected $fillable = [
        'assistant_id',
        'patient_id',
        'from_patient_id',
        'visit_id',
        'is_delete',
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

    public function visit()
    {
        return $this->belongsTo(Visit::class);
    }


}
