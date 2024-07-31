<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Response;

class DevServicesController extends Controller
{
    /**
     * Service names as keys, ports as values
     *
     * @var array<string, int>
     */
    private const PORTS = [
        'mailhog' => 8025,
        'adminer' => 8080,
    ];

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): Response
    {
        $services = [];

        foreach (self::PORTS as $name => $port) {
            try {
                $httpRequest = Http::get("{$name}:{$port}");
                if ($httpRequest->status() === 200) {
                    $services[$name] = "http://localhost:{$port}";
                }
            } catch (\Throwable) {
                // ignore
            }
        }

        return $this->inertia('DevServices', ['services' => $services]);
    }
}
