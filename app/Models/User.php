<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'surname',
        'pesel',
        'disability',
        'phone',
        'street',
        'post_code',
        'city',
        'status',
        'is_delete',
        'company_id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function role()
    {
        return $this->belongsToMany(Role::class, 'roleUsers', 'user_id', 'role_id');
    }

    public function visit()
    {
        return $this->belongsToMany(Visit::class, 'visitUsers', 'visit_id');
    }


    public function project()
    {
        return $this->belongsToMany(Project::class, 'projectUsers', 'user_id', 'project_id');
    }

    public function patient()
    {
        return $this->belongsToMany(User::class, 'assistantPatients', 'patient_id', 'assistant_id');
    }



    public function countHours()
    {
        return $this->belongsToMany(Project::class, 'countHoursYear', 'assistant_id', 'patient_id', 'project_id');
    }








    public function hasAnyRole($roles)
    {
        if(is_array($roles))
        {
            foreach($roles as $role)
            {
                if($this->hasRole($role))
                {
                    return true;
                }
            }
        }
        else
        {
            if($this->hasRole($roles))
            {
                return true;
            }
        }
        return false;
    }

    public function hasRole($role)
    {
        if($this->roles()->where('name', $role)->first())
        {
            return true;
        }
        return false;
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}