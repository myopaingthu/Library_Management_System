<?php

namespace App\Contracts\Dao;

/**
 * Interface of Data Access Object for Admin
 */
interface AdminDaoInterface
{
    /**
     * Get Admin Data lists
     *
     * @return array $count
     */
    public function getAdminDataTotalCount();
}
