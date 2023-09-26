<?php

namespace App\Repositories;
use App\Models\Service;

//wykonuje logikę dostępu do danych
class ServiceRepository extends BaseRepository{

    public function __construct(Service $model)
    {
        $this->model=$model;
    }

}
