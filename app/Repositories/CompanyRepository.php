<?php

namespace App\Repositories;
use App\Models\Company;

//wykonuje logikę dostępu do danych
class CompanyRepository extends BaseRepository{

    public function __construct(Company $model)
    {
        $this->model=$model;
    }

}