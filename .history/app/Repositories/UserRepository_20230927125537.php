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
        return DB::select( DB::raw("SELECT COUNT(*) as user_count FROM users WHERE isActive=1 GROUP BY isActive"));


        //DB::table('users')->selectRaw(DB::raw('count (*) as user_count'))->groupBy('isActive')->get();

    }
}
