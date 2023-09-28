<?php

namespace App\Repositories;
use App\Models\User;
use DB;
//wykonuje logikę dostępu do danych
class UserRepository extends BaseRepository{

    public function __construct(User $model)
    {
        $this->model=$model;
    }

    public function getAllAsistant()
    {
        //return $this->model->where('roles', '2')->orderby('name', 'asc')->get();

    }

    public function getStatistics()
    {
        return DB::table('users')->select(DB::raw('count (*) as user_count, isActive'))->groupBy('isActive')->get();

    }
}
