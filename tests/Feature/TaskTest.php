<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Faker\Factory;
use App\User;
use App\Task;

class TaskTest extends TestCase
{
    /**
     * test TaskList.
     *
     * @return void
     */
    public function testTaskList()
    {
        $response = $this->get('api/task');

        $response->assertStatus(200);
    }

    /**
     * test AddTask
     *
     * @return void
     */
    public function testAddTask()
    {
        $faker = Factory::create();

        $response = $this->post('api/store', [
            'user_id' => User::all()->random()->id,
            'title' => $faker->name,
            'description' => $faker->text,
            'status' => mt_rand(0, 1)
        ]);

        $response->assertStatus(200);
    }

    /**
     * test GetTask
     *
     * @return void
     */
    public function testGetTask()
    {
        $id = User::all()->random()->id;
        $response = $this->get("api/task/$id");

        $response->assertStatus(200);

    }

    /**
     * test DeleteTask
     *
     * @return void
     */
    public function testDeleteTask()
    {
        $id = Task::all()->random()->id;
        $response = $this->post("api/delete/$id");

        $response->assertStatus(200);

    }
}
