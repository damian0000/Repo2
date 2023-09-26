<?php

namespace App\Repositories;
use App\Models\AssistantService;

//wykonuje logikę dostępu do danych
class AssistantServiceRepository extends BaseRepository{

    public function __construct(AssistantService $model)
    {
        $this->model=$model;
    }

}