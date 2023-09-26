<?php

namespace App\Repositories;
use App\Models\AssistantService;

//wykonuje logikę dostępu do danych
class VisitRepository extends BaseRepository{

    public function __construct(Visit $model)
    {
        $this->model=$model;
    }

}
