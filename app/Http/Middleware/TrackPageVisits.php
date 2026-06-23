<?php

namespace App\Http\Middleware;

use App\Models\PageVisit;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\HttpFoundation\Response;

class TrackPageVisits
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $path = ltrim($request->path(), '/');

        if (
            str_starts_with($path, 'admin') ||
            str_starts_with($path, 'storage') ||
            str_starts_with($path, 'assets') ||
            str_starts_with($path, 'favicon') ||
            str_starts_with($path, 'robots.txt') ||
            str_starts_with($path, 'sitemap.xml') ||
            str_starts_with($path, 'llms.txt') ||
            !$request->isMethod('GET')
        ) {
            return $response;
        }

        $routeName = $request->route()?->getName() ?? $request->path();
        $ip = (string) $request->ip();
        $payload = "$ip|{$request->userAgent()}|" . (string) config('app.key');
        $ipHash = hash('sha256', $payload);

        try {
            if (! Schema::hasTable('page_visits')) {
                return $response;
            }

            PageVisit::create([
                'page_slug' => $routeName,
                'path' => '/' . $path,
                'route_name' => $routeName,
                'ip_hash' => $ipHash,
                'user_agent' => substr((string) $request->userAgent(), 0, 1024),
                'referrer' => (string) $request->headers->get('referer'),
                'visited_at' => now(),
            ]);
        } catch (\Throwable $exception) {
            report($exception);
        }

        return $response;
    }
}
