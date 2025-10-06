<?php

namespace App\Http\Controllers;

use App\Models\StaffApplication;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function saveApplication(Request $request): void
    {
        $request->validate([
            'ign' => 'required',
            'discord_tag'=> 'required',
            'age' => 'required',
            'reason' => 'required',
            'experience' => 'required',
            'activity' => 'required',
        ]);

        StaffApplication::create([
            'ign' => $request->ign,
            'discord_tag' => $request->discord_tag,
            'age' => $request->age,
            'reason' => $request->reason,
            'experience' => $request->experience,
            'activity' => $request->activity
        ]);
    }
}
