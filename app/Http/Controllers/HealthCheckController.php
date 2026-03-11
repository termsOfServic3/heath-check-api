<?php

namespace App\Http\Controllers;

use App\Services\HealthCheckService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HealthCheckController extends Controller
{
    public function __construct(
        private readonly HealthCheckService $healthCheckService,
    ) {}

    public function __invoke(Request $request): JsonResponse
    {
        $result = $this->healthCheckService->check();

        return response()->json(
            data: $result->toArray(),
            status: $result->isHealthy() ? 200 : 500,
        );
    }
}