<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use App\Models\OrganizerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OrganizerProfileController extends Controller
{
    /**
     * Display organizer profile.
     */
    public function index()
    {
        $profile = OrganizerProfile::where('user_id', Auth::id())->first();

        return view('organizer.profile.index', compact('profile'));
    }

    /**
     * Display create or edit profile form.
     */
    public function edit()
    {
        $profile = OrganizerProfile::where('user_id', Auth::id())->first();

        return view('organizer.profile.edit', compact('profile'));
    }

    /**
     * Store or update organizer profile.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'organization_name' => [
                'required',
                'string',
                'max:255',
            ],

            'organization_type' => [
                'required',
                'string',
                'max:100',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'website_url' => [
                'nullable',
                'url',
                'max:255',
            ],

            'contact_email' => [
                'required',
                'email',
                'max:255',
            ],

            'logo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'remove_logo' => [
                'nullable',
                'boolean',
            ],
        ]);

        $profile = OrganizerProfile::firstOrNew([
            'user_id' => Auth::id(),
        ]);

        $oldLogoPath = $profile->logo_path;
        $newLogoPath = $oldLogoPath;

        /*
        |--------------------------------------------------------------------------
        | Upload New Logo
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('logo')) {
            $newLogoPath = $request->file('logo')
                ->store('organizer-logos', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Remove Existing Logo
        |--------------------------------------------------------------------------
        */

        elseif ($request->boolean('remove_logo')) {
            $newLogoPath = null;
        }

        /*
        |--------------------------------------------------------------------------
        | Save Profile
        |--------------------------------------------------------------------------
        */

        $profile->fill([
            'organization_name' => $validated['organization_name'],
            'organization_type' => $validated['organization_type'],
            'description' => $validated['description'] ?? null,
            'website_url' => $validated['website_url'] ?? null,
            'contact_email' => $validated['contact_email'],
            'logo_path' => $newLogoPath,
        ]);

        $profile->save();

        /*
        |--------------------------------------------------------------------------
        | Delete Old Logo
        |--------------------------------------------------------------------------
        */

        if (
            $oldLogoPath &&
            $oldLogoPath !== $newLogoPath
        ) {
            Storage::disk('public')->delete($oldLogoPath);
        }

        return redirect()
            ->route('organizer.profile')
            ->with('success', 'Organizer profile has been saved successfully.');
    }
}
