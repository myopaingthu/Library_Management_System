<?php

namespace App\Contracts\Services;

/**
 * Interface for Admin service.
 */
interface AdminServiceInterface
{
    /**
     * Get Admin Data lists
     *
     * @return array $count
     */
    public function getAdminDataTotalCount();
}
