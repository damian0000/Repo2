<?php

namespace App\Repositories;
use App\Models\User;
use App\Models\Role;
use DB;
//wykonuje logikę dostępu do danych
class UserRepository extends BaseRepository{

    public function __construct(User $model)
    {
        $this->model=$model;
    }

    public function getAllAsistant()
    {

        return $this->model->whereHas('roles_users', function($sql){
            $sql->where('roles_users.user_id', 'id');
        })->whereHas('roles', function($sql){
            $sql->where('roles.id', 'role_id');
        })->get();

    }

    public function getStatistics()
    {
        return DB::select( DB::raw("SELECT isActive, COUNT(*) as user_count FROM users GROUP BY isActive"));
    }
}