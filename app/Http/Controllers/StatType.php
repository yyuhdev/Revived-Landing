<?php

namespace App\Http\Controllers;

enum StatType: string
{
    case KILL = 'kills';
    case DEATH = 'deaths';
    case WIN = 'wins';
    case LOSS = 'losses';
}
