<?php

namespace App\Http\Controllers;

use App\Contracts\Services\SettingServiceInterface;
use App\Http\Requests\SaveSettingRequest;

class SettingController extends Controller
{
    /**
     * Setting Service
     */
    private $settingService;

    /**
     * Class Constructor
     *
     * @param SettingServiceInterface $settingService
     * @return void
     */
    public function __construct(SettingServiceInterface $settingService)
    {
        $this->settingService = $settingService;
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $setting = $this->settingService->getSetting();
        return view('setting.show', compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = $this->settingService->findSettingById($id);
        return view('setting.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\SaveSettingRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveSettingRequest $request, $id)
    {
        $this->settingService->updateSetting($request->all(), $id);
        return redirect()->route('setting.show')
            ->with('success', 'Setting edited successfully.');
    }
}
