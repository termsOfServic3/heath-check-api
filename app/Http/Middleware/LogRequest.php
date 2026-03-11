<?php

namespace App\Http\Middleware;

use App\Models\RequestLog;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class LogRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       $response = $next($request);
       $this->storeLog($request, $response);
       return $response;
    }

    public function storeLog(Request $request, Response $response): void 
    {
        try {

            RequestLog::create([
                'method' => $request->method(),
                'path' => $request->path(),
                'ip' => $request->ip(),
                'status_code' => $response->getStatusCode(),
                'x_owner' => $response->headers->get('X-Owner')
            ]);
        }
            catch (Throwable) {
                //
            }
    }
}
