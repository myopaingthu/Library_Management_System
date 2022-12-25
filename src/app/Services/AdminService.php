<?php

namespace App\Services;

use App\Contracts\Dao\AdminDaoInterface;
use App\Contracts\Services\AdminServiceInterface;

/**
 * Service class for Admin.
 */
class AdminService implements AdminServiceInterface
{
    /**
     * Admin Dao
     */
    private $adminDao;

    /**
     * Class Constructor
     *
     * @param AdminDaoInterface $adminDao
     * @return void
     */
    public function __construct(AdminDaoInterface $adminDao)
    {
        $this->adminDao = $adminDao;
    }

    /**
     * Get Admin Data lists
     *
     * @return array $count
     */
    public function getAdminDataTotalCount()
    {
        return $this->adminDao->getAdminDataTotalCount();
    }
}
