<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;

class PlayerSearchController extends Controller
{
    public function getStats(Request $request, $uuid)
    {
        $username = config('revived.username');
        $password = config('revived.password');
        $host = config('revived.host');
        $database = config('revived.database');

        $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);

        if (empty($uuid)) {
            return ['kills' => 0, 'deaths' => 0, 'wins' => 0, 'losses' => 0];
        }

        $sql = "SELECT * FROM stats WHERE uuid = :uuid";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':uuid', $uuid);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        return ['kills' => 0, 'deaths' => 0, 'wins' => 0, 'losses' => 0];
    }
}
