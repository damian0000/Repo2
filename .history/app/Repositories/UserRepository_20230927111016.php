<?php

namespace App\Repositories;
use App\Models\User;

//wykonuje logikę dostępu do danych
class UserRepository extends BaseRepository{

    public function __construct(User $model)
    {
        $this->model=$model;
    }

    public function getAllAsistant()
    {
        //return $this->model->where('roles', '2')->orderby('name', 'asc')->get();

        //query builder
        return DB::table('users')
            ->Join('roles_users', 'users.id', '=', 'roles_users.user_id')
            ->get();
    }

}
