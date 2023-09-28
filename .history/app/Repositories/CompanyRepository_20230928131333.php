<?php

namespace App\Repositories;
use App\Models\Role;

//wykonuje logikę dostępu do danych
class CompanyRepository extends BaseRepository{

    public function __construct(Company $model)
    {
        $this->model=$model;
    }

}
