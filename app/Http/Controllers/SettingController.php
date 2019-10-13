<?php

namespace App\Http\Controllers;

use App\Settings;
use App\SettingsGroup;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings_group = SettingsGroup::all();

        return view('pages.settings.components.general', compact('settings_group'));
    }

    public function getPaymentScreen()
    {
        $settings_group = SettingsGroup::all();

        return view('pages.settings.components.payment', compact('settings_group'));
    }

    public function getCompanyScreen()
    {
        $settings_group = SettingsGroup::all();

        return view('pages.settings.components.company', compact('settings_group'));
    }

    public function edit(Request $request, $id)
    {
        $settings = Settings::find($id);

        return view('pages.settings.components.general', compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $settings = Settings::find($id);
        $settings->app_name  = $request->get('app_name');
        $settings->language  = $request->get('language    =');
        $settings->date_foramt            = $request->get('date_format');
        $settings->save();

        return redirect()
            ->route('settings.index')
            ->with('success', 'Settings edited successfully.');
    }
}
