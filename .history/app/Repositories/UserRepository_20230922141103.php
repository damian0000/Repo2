<?php

namespace App\Repositories;
use App\Models\User;

//wykonuje logikę dostępu do danych
class UserRepository extends BaseRepository{

    public function __construct(User $model)
    {
        $this->model=$model;
    }

}