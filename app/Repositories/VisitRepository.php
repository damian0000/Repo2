<?php

namespace App\Repositories;
use App\Models\Visit;
use App\Models\User;
use DB;

//wykonuje logikę dostępu do danych
class VisitRepository extends BaseRepository{

    public function __construct(Visit $model)
    {
        $this->model=$model;
    }

  
}