<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\Setting\EditRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{


    public function edit($id)
    {
        // Find the setting with the specified ID (e.g., 1)
        $setting = Setting::find($id);

        // Pass the setting data to the edit view
        return view('admin.setting.edit', compact('setting'));

    }
    public function update(Request $request, Setting $setting)
    {
        // Handle image upload
        if ($request->hasFile('photo')) {
            // Delete old image if it exists
            if ($setting->image) {
                // Use the Storage facade to delete the old image file
                Storage::delete($setting->image);
            }

            // Upload the new image
            $imagePath = $request->file('photo')->store('public/images');
            $setting->image = $imagePath;
        }

        // Update other fields
        $setting->update($request->except('photo'));

        // Redirect to the specific URL after updating
        return redirect('/admin/setting/' . $setting->id.'/edit')->with('success', 'Settings updated successfully');
    }


public function show(){

}
    // ... existing methods ...
}


