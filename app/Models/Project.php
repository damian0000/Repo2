<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'company_id',
        'created_at',
        'updated_at',
        'is_delete'
    ];
    public function projectUsers()
    {
        return $this->hasMany(ProjectUser::class);
    }

    // public function company()
    // {
    //     return $this->belongsToMany(Company::class, 'companyprojects', 'project_id', 'company_id');
    // }



    
    public static function findName($name)
    {
        return self::where('name', $name)->first();
    }
}
