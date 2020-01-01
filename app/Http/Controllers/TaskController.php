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
        $message = !$task ? 'error' : 'sucess';
        return response()->json([
            'task' => $task,
            'message' => $message
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
        $task = $this->task->update($id, $request->only('title', 'description'));

        if(!$task){
            return response()->json([
                'message' => 'error'
            ], 404);
        }

        return response()->json([
            'message' => 'success'
        ], 200);
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

        if($destroy !==1){
            return response()->json([
                'message' => 'error'
            ],404);
        }

        return response()->json([
            'message' => 'sucess'
        ],200);
    }
}
