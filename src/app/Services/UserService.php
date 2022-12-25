<?php

namespace App\Services;

use App\Contracts\Dao\UserDaoInterface;
use App\Contracts\Services\UserServiceInterface;

/**
 * Service class for User.
 */
class UserService implements UserServiceInterface
{
    /**
     * User Dao
     */
    private $userDao;

    /**
     * Class Constructor
     *
     * @param UserDaoInterface $userDao
     * @return void
     */
    public function __construct(UserDaoInterface $userDao)
    {
        $this->userDao = $userDao;
    }

    /**
     * Get User lists
     *
     * @return \Illuminate\Support\Collection $users
     */
    public function getUsers()
    {
        return $this->userDao->getUsers();
    }

    /**
     * Find User By Id
     *
     * @param integer $id
     * @return object $user
     */
    public function findUserById($id)
    {
        return $this->userDao->findUserById($id);
    }

    /**
     * Save User
     *
     * @param array $request
     * @return void
     */
    public function saveUser($request)
    {
        $this->userDao->saveUser($request);
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
        $this->userDao->updateUser($request, $id);
    }

    /**
     * Delete User
     *
     * @param int $id
     * @return void
     */
    public function deleteUser($id)
    {
        $this->userDao->deleteUser($id);
    }
}
