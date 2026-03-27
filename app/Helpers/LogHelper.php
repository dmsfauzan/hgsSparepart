<?php

namespace App\Helpers;

use App\Models\ActivityLog;

class LogHelper
{
    public static function log(string $aktivitas, string $modul, string $keterangan = null): void
    {
        ActivityLog::create([
            'user_id' => auth()->id(),
            'aktivitas' => $aktivitas,
            'modul' => $modul,
            'keterangan' => $keterangan,
            'ip_address' => request()->ip(),
        ]);
    }
}
