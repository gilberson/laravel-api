<?php

namespace App\Repositories;

use App\Task;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class TaskRepository implements TaskRepositoryInterface
{
    /**
     * Get a task by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($id)
    {
        return Task::find($id);
    }

    /**
     * Get all tasks.
     *
     * @return mixed
     */
    public function all()
    {
        return Task::all();
    }

    /**
     * Create a task.
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        $task = Task::create($request->all());
        $task = $task->fresh();

        return $task;
    }

    /**
     * Deletes a task.
     *
     * @param int
     */
    public function delete($id)
    {
        $task = Task::find($id);
        if($task){
            $destroy = Task::destroy($id);
        }

        if($destroy) return $destroy;
    }

    /**
     * Updates a task.
     *
     * @param int
     * @param array
     */
    public function update($id, array $data)
    {
        //Task::find($id)->update($data);
        $task = Task::find($id);
        $update = $task->fill($data)->save();

        if($update){
            return true;
        } else {
            return false;
        }
    }
}
