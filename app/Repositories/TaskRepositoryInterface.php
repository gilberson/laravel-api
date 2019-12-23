<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface TaskRepositoryInterface
{
    /**
     * Get a task by it's ID
     *
     * @param int
     */
    public function get($id);

    /**
     * Get all tasks.
     *
     * @return mixed
     */
    public function all();

    /**
     * Create a task
     *
     * @return mixed
     */
    public function store(Request $request);

    /**
     * Deletes a task.
     *
     * @param int
     */
    public function delete($id);

    /**
     * Updates a task.
     *
     * @param int
     * @param array
     */
    public function update($id, array $data);
}
