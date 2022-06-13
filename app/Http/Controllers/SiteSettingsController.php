<?php

namespace App\Http\Controllers;

use App\Models\SiteSettings;
use Illuminate\Http\Request;

class SiteSettingsController extends Controller
{
    //
    public function create () {
        return view('backend.sitesettings.sitesettingscreate');
    }

    public function store(Request $request) {
        $input = $request->all();

        $this->validate($request, [
            'sitename' => 'required',
            'logo'  => 'required',
            'favicon'   => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        if ($logo = $request->file('logo')){
            $name = time() . $logo->getClientOriginalName();
            $destination = 'assets/uploads/logo/';
            $logo->move($destination, $name);
            $input['logo'] = $name;
        }

        if ($favicon = $request->file('favicon')) {
            $name = time() . $favicon->getClientOriginalName();
            $destination = 'assets/uploads/logo/';
            $favicon->move($destination, $name);
            $input['favicon'] = $name;
        }

        SiteSettings::create($input);
//        return redirect();
    }

    public function edit ($id) {
        $settings = SiteSettings::find(1);
        return view('backend.sitesettings.sitesettingsedit', compact('settings'));
    }

    public function update (Request $request, $id) {
        $input = $request->all();
        $this->validate($request, [
            'sitename' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        $settings = SiteSettings::find($id);

        if ($logo = $request->hasFile('logo')) {
            $name = time() . $logo->getClientOriginalName();
            $destination = 'assets/uploads/logo/';
            $logo->move($destination, $name);
            $input['logo'] = $name;
        } else {
            $input['logo'] = $settings->logo;
        }

        if ($favicon = $request->file('favicon')) {
            $name = time() . $favicon->getClientOriginalName();
            $destination = 'assets/uploads/logo/';
            $favicon->move($destination, $name);
            $input['favicon'] = $name;
        } else {
            $input['favicon'] = $settings->favicon;
        }

        $settings->update($input);
        session()->flash('alert-success', 'Settings updated successfully');
        return redirect('/site-settings/1/edit');
    }
}
