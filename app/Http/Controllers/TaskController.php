<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TaskRepositoryInterface;

class TaskController extends Controller
{
    //instance of task
    protected $task;

    /**
     * TaskController constructor.
     *
     * @param TaskRepositoryInterface $task
     */
    public function __construct(TaskRepositoryInterface $task)
    {
        $this->task = $task;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->task->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = $this->task->store($request);

        if(!$task){
            return response()->json([
                'message' => 'error'
            ], 400);
        }

        return response()->json([
            'task' => $task,
            'message' => 'success'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = $this->task->get($id);

        if(!$task){
            return response()->json([
                'message' => 'error'
            ], 404);
        }

        return $this->task->get($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = $this->task->update($id, $request->all());

        if($task){
            return response()->json([
                'message' => 'success',
                'task' => $task
            ], 200);
        } else {
            return response()->json([
                'message' => 'error',
                'task' => $task
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = $this->task->delete($id);

        if(!$destroy){
            return response()->json([
                'message' => 'error'
            ],404);
        }

        return response()->json([
            'message' => 'sucess'
        ],200);
    }
}
