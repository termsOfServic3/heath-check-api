Health Check API
Simple Laravel API with Docker infrastructure (MySQL + Redis).
Stack

PHP 8.3 + Laravel 11
MySQL 8.0
Redis (cache driver)
Nginx

Quick Start
bash git clone git@github.com:termsOfServic3/heath-check-api.git
docker compose up -d
The API will be available at: http://localhost:8080

On first start, migrations run automatically via the entrypoint script.

Endpoint
GET /api/v1/health-check
Checks database and cache connectivity.
Response 200 — all services healthy:
json{
  "db": true,
  "cache": true
}
Response 500 — one or more services unavailable:
json{
  "db": true,
  "cache": false
}
Response headers include:
X-Owner: 550e8400-e29b-41d4-a716-446655440000
Features

Throttle — 60 requests/min per IP
X-Owner header — unique UUID signed on every response
Request logging — every request stored in request_logs table