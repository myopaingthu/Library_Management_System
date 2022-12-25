<?php

namespace App\Dao;

use App\Contracts\Dao\UserDaoInterface;
use App\Models\User;

/**
 * Data Access Object for User
 */
class UserDao implements UserDaoInterface
{
    /**
     * Get User lists
     *
     * @return \Illuminate\Support\Collection $users
     */
    public function getUsers()
    {
        return User::query();
    }

    /**
     * Find User By Id
     *
     * @param integer $id
     * @return object $user
     */
    public function findUserById($id)
    {
        return User::findOrFail($id);
    }

    /**
     * Save User
     *
     * @param array $request
     * @return void
     */
    public function saveUser($request)
    {
        User::create($request);
    }

    /**
     * Update User
     *
     * @param array $request
     * @param integer $id
     * @return void
     */
    public function updateUser($request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request);
    }

    /**
     * Delete User
     *
     * @param int $id
     * @return void
     */
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }
}
