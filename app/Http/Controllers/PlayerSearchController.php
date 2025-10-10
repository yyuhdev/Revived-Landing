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

    public function getMatchHistory($uuid)
    {
        $username = config('revived.username');
        $password = config('revived.password');
        $host = config('revived.host');
        $database = config('revived.database');

        $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);

        if (empty($uuid)) {
            return [];
        }

        $sql = "SELECT * FROM matches WHERE JSON_CONTAINS_PATH(redTeam, 'one', CONCAT('$.', :uuid)) OR JSON_CONTAINS_PATH(blueTeam, 'one', CONCAT('$.', :uuid))";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':uuid', $uuid);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return [];
    }


    public function getGlobalStats(): array
    {
        $username = config('revived.username');
        $password = config('revived.password');
        $host = config('revived.host');
        $database = config('revived.database');

        $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);

        $sql = "SELECT * FROM stats";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return [];
    }

    public function getPunishmentHistory($uuid): array
    {
        $username = config('punishments.username');
        $password = config('punishments.password');
        $host = config('punishments.host');
        $database = config('punishments.database');

        $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        $sql = "SELECT * FROM litebans_bans WHERE uuid = :uuid";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':uuid', $uuid);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() > 0) {

            foreach ($data as &$row) {
                unset($row['ip']);
            }

            return $data;
        }

        return [];
    }

    public function getLeaderboardStats(StatType $type): array
    {
        $stats = $this->getGlobalStats();

        if (empty($stats)) {
            return [];
        }

        switch ($type) {
            case StatType::KILL: {
                usort($stats, function($a, $b) {
                    return $b['kills'] <=> $a['kills'];
                });
                return $stats;
            }
            case StatType::DEATH: {
                usort($stats, function($a, $b) {
                    return $b['deaths'] <=> $a['deaths'];
                });
                return $stats;
            }
            case StatType::WIN: {
                usort($stats, function($a, $b) {
                    return $b['wins'] <=> $a['wins'];
                });
                return $stats;
            }
            case StatType::LOSS: {
                usort($stats, function($a, $b) {
                    return $b['losses'] <=> $a['losses'];
                });
                return $stats;
            }
        }

        return [];
    }
}
