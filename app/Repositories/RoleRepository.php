<?php

namespace App\Repositories;
use App\Models\Role;

//wykonuje logikę dostępu do danych
class RoleRepository extends BaseRepository{

    public function __construct(Role $model)
    {
        $this->model=$model;
    }

}