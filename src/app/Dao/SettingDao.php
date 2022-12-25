<?php

namespace App\Dao;

use App\Contracts\Dao\SettingDaoInterface;
use App\Models\Setting;

/**
 * Data Access Object for Setting
 */
class SettingDao implements SettingDaoInterface
{
    /**
     * Get Setting
     * @return object $setting
     */
    public function getSetting()
    {
        return Setting::all()->first();
    }

    /**
     * Find Setting By Id
     *
     * @param integer $id
     * @return object $setting
     */
    public function findSettingById($id)
    {
        return Setting::findOrFail($id);
    }

    /**
     * Save Setting
     *
     * @param array $request
     * @return void
     */
    public function saveSetting($request)
    {
        Setting::create($request);
    }

    /**
     * Update Setting
     *
     * @param array $request
     * @param integer $id
     * @return void
     */
    public function updateSetting($request, $id)
    {
        $setting = Setting::findOrFail($id);
        $setting->update($request);
    }
}
