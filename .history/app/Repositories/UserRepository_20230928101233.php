<?php

namespace App\Repositories;
use App\Models\User;
use App\Models\Role;
use App\Models\RolesUser;
use DB;
//wykonuje logikę dostępu do danych
class UserRepository extends BaseRepository{

    public function __construct(User $model)
    {
        $this->model=$model;
    }

    public function getAllAsistant()
    {

        // return $this->model->whereHas('roleusers', function($sql){
        //     $sql->where('roleusers.user_id', 'id');
        // })->whereHas('roles', function($sql){
        //     $sql->where('roles.id', 'role_id');
        // })->get();

        // return DB::select( DB::raw("SELECT isActive, COUNT(*) as user_count FROM users GROUP BY isActive"));

        return DB::table('users')
            ->select('users.*')
            ->join('roleusers', 'users.id', '=', 'roleusers.user_id')
            ->join('roles', 'roleusers.role_id', '=', 'roles.id')
            ->wheere('roles.name', 'Asystent')
            ->get();

    }

    public function getStatistics()
    {
        return DB::select( DB::raw("SELECT isActive, COUNT(*) as user_count FROM users GROUP BY isActive"));
    }
}
