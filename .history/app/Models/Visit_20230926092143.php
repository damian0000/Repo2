<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = [
        'user_id',
        'patient_id',
        'patient_id_from_where',
        'tavel_time',
        'service_date',
        'service_start_time',
        'service_end_time',
        'service_id',
        'description',
        'isDelete',
        'created_at',
        'updated_at'
    ];

}