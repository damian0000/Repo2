<?php

namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;

//wykonuje logikę dostępu do danych
abstract class BaseRepository{
    protected $model;

    public function getAll($columns=array('*'))
    {
        return $this->model->get($columns);
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($data, $id)
    {
        return $this->model->where('id', '=', $id)->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($data);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }
}