<?php

namespace App\Services;

use App\Contracts\Dao\SettingDaoInterface;
use App\Contracts\Services\SettingServiceInterface;

/**
 * Service class for Setting.
 */
class SettingService implements SettingServiceInterface
{
    /**
     * Setting Dao
     */
    private $settingDao;

    /**
     * Class Constructor
     *
     * @param SettingDaoInterface $settingDao
     * @return void
     */
    public function __construct(SettingDaoInterface $settingDao)
    {
        $this->settingDao = $settingDao;
    }

    /**
     * Get Setting
     * @return object $setting
     */
    public function getSetting()
    {
        return $this->settingDao->getSetting();
    }

    /**
     * Find Setting By Id
     *
     * @param integer $id
     * @return object $setting
     */
    public function findSettingById($id)
    {
        return $this->settingDao->findSettingById($id);
    }

    /**
     * Save Setting
     *
     * @param array $request
     * @return void
     */
    public function saveSetting($request)
    {
        $this->settingDao->saveSetting($request);
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
        $this->settingDao->updateSetting($request, $id);
    }
}
