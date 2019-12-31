<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepositoryInterface;

class UserController extends Controller
{
    protected $user;

    /**
     * UserController constructor.
     *
     * @param UserRepositoryInterface $user
     */
    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }

    /**
     * Get all users.
     *
     * @return mixed
     */
    public function index()
    {
        return response()->json([
            'users' => $this->user->all()
            ], 200);
    }

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return mixed
     */
    public function show($id)
    {
        $user = $this->user->get($id);
        return response()->json([
            'user' => $user
            ], 200);
    }
}
