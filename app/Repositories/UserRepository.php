<?php

namespace App\Repositories;

use App\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class UserRepository implements UserRepositoryInterface
{
    /**
     * Get a user(with his tasks) by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($id)
    {
        return User::where('id', $id)
           ->orderBy('name', 'desc')
           ->with('tasks')
           ->get();
    }

    /**
     * Get all tasks.
     *
     * @return mixed
     */
    public function all()
    {
        return User::all();
    }
}
