<?php

namespace App\Services;

readonly class HealthCheckResult {
    public function __construct(
        public bool $db,
        public bool $cache

    )
    {   }

    public function isHealthy(): bool
    {
        return $this->db && $this->cache;
    }

    public function toArray(): array
    {
        return [
            'db' => $this->db,
            'cache' => $this->cache
        ];
    }

    
}