<?php

namespace App\Contracts\Services;

/**
 * Interface for User service.
 */
interface UserServiceInterface
{
    /**
     * Get User lists
     *
     * @return \Illuminate\Support\Collection $users
     */
    public function getUsers();

    /**
     * Find User By Id
     *
     * @param integer $id
     * @return object $user
     */
    public function findUserById($id);

    /**
     * Save User
     *
     * @param array $request
     * @return void
     */
    public function saveUser($request);

    /**
     * Update User
     *
     * @param array $request
     * @param integer $id
     * @return void
     */
    public function updateUser($request, $id);

    /**
     * Delete User
     *
     * @param int $id
     * @return void
     */
    public function deleteUser($id);
}
