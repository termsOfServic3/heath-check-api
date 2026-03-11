<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Throwable;

class HealthCheckService {


    public function check(): HealthCheckResult
    {
        $db = $this->checkDatabase();
        $cache = $this->checkCache();

        return new HealthCheckResult(db: $db, cache: $cache);
    }

    private function checkDatabase(): bool
    {
        try {
            DB::connection()->getPdo();
            return true;

        } catch(Throwable) {
            return false;
        }
    }

    private function checkCache(): bool {
        try {
        $key = 'health_check_probe';
        Cache::put($key, true, 5);
        return Cache::get($key) === true;
        } catch (Throwable) {
            return false;
        }
    }
}