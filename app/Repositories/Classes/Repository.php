<?php

namespace App\Repositories\Classes;

use App\Repositories\Interfaces\RepositoryContract;

abstract class Repository implements RepositoryContract
{
    protected $model;

    /**
     * Return Model class
     */
    abstract public function model();

    public function __construct()
    {
        $this->model = $this->model();
    }

    public function all()
    {
        $model = $this->model;
        $collection = $model::all();

        return $collection;
    }

    public function find($id)
    {
        $model = $this->model;
        $instance = $model::findOrFail($id);

        return $instance;
    }
    
    public function store($data)
    {
        $model = $this->model;
        
        if ($model::create($data)) {
            return true;
        }

        return false;
    }

    public function update($id, $data) {
        $model = $this->model;
        $instance = $model::findOrFail($id);

        if ($instance->update($data)) {
            return true;
        }

        return false;
    }

    public function delete($id) {
        $model = $this->model;
        $instance = $model::findOrFail($id);

        if ($instance->delete()) {
            return true;
        }

        return false;
    }

    public function hardDelete($id)
    {
        $model = $this->model;
        $instance = $model::findOrFail($id);

        if ($instance->forceDelete()) {
            return true;
        }

        return false;
    }
}