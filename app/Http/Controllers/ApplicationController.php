<?php

namespace App\Http\Controllers;

use App\Models\StaffApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

        $webhook = config('discord.webhook');

        Http::post($webhook, [
            'embeds' => [
                [
                    'title' => "A new application has been submitted!",
                    'description' =>
                        "**IGN**: " . $request->ign .
                        "\n **Discord Tag**: " . $request->discord_tag .
                        "\n **Age**: " . $request->age .
                        "\n **Reason**: " . $request->reason .
                        "\n **Experience**: " . $request->experience .
                        "\n **Activity**: " . $request->activity,
                    'color' => '7506394',
                ]
            ]]);

    }
}
