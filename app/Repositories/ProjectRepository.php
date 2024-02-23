<?php

namespace App\Repositories;

use App\Models\Project;

//wykonuje logikę dostępu do danych
class ProjectRepository extends BaseRepository{

    public function __construct(Project $model)
    {
        $this->model=$model;
    }
  
}
