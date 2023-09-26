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
        // return $this->model->where('role', '2')->orderby('name', 'asc')->get();
        return $this->model->getAll();
    }
}
