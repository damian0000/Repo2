<?php

namespace App\Repositories;
use App\Models\Role;

use DB;
//wykonuje logikę dostępu do danych
class RoleRepository extends BaseRepository{

    public function __construct(Role $model)
    {
        $this->model=$model;
    }

    public function getRoleWithoutPatient()
    {
        return DB::table('roles')
            ->where('name', '!=', 'Pacjent')
            ->get();
    }

    public function getRolePatient()
    {
        return DB::table('roles')
            ->where('name', '=', 'Pacjent')
            ->get();
    }

}
