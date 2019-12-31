<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface UserRepositoryInterface
{
    /**
     * Get a user by it's ID
     *
     * @param int
     */
    public function get($id);

    /**
     * Get all users.
     *
     * @return mixed
     */
    public function all();
}
