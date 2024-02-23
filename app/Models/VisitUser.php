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


}
