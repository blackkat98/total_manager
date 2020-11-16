<?php

namespace App\Repositories\Interfaces;

interface RepositoryContract
{
    /**
     * Declare the Model to handle
     */
    public function model();

    /**
     * Get all Model's table data
     */
    public function all();

    /**
     * Find by ID
     * 
     * @param int $id
     */
    public function find($id);

    /**
     * Store data
     * 
     * @param array $data
     */
    public function store($data);

    /**
     * Update a specific row
     * 
     * @param int $id
     * @param array $data
     */
    public function update($id, $data);

    /**
     * Delete a specific instance data
     * 
     * @param int $id
     */
    public function delete($id);

    /**
     * Remove soft-deletable item completely
     * 
     * @param int $id
     */
    public function hardDelete($id);
}