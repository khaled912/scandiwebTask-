<?php

namespace Helper;

class Router
{
    private array $routes = [];

    public function get(string $url, string $fn)
    {
        $this->routes['GET'][$url] = $fn;
    }

    public function post(string $url, string $fn)
    {
        $this->routes['POST'][$url] = $fn;
    }

    public function delete(string $url, string $fn)
    {
        $this->routes['DELETE'][$url] = $fn;
    }

    public function resolve()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $url = $_SERVER['REQUEST_URI'] ?? '/';
        $urlParts = parse_url($url);
        $path = $urlParts['path'];
        $queryParams = $urlParts['query'] ?? '';
        parse_str($queryParams, $query);

        if (isset($this->routes[$method])) {
            foreach ($this->routes[$method] as $routeUrl => $handler) {
                if ($this->urlMatches($routeUrl, $path)) {
                    $handler($query);
                    return;
                }
            }
        }

        http_response_code(404);
        echo "Not Found";
    }

    private function urlMatches(string $routeUrl, string $path): bool
    {
        $routeUrl = strtok($routeUrl, '?');
        return rtrim($routeUrl, '/') === rtrim($path, '/');
    }

}
