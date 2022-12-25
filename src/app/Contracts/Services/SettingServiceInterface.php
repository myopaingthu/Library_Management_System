<?php

namespace App\Contracts\Services;

/**
 * Interface for Setting service.
 */
interface SettingServiceInterface
{
    /**
     * Get Setting
     * @return object $setting
     */
    public function getSetting();

    /**
     * Find Setting By Id
     *
     * @param integer $id
     * @return object $setting
     */
    public function findSettingById($id);

    /**
     * Save Setting
     *
     * @param array $request
     * @return void
     */
    public function saveSetting($request);

    /**
     * Update Setting
     *
     * @param array $request
     * @param integer $id
     * @return void
     */
    public function updateSetting($request, $id);
}
