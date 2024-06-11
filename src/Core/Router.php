<?php
namespace App\Core;

class Router {
    protected $routes = [];

    public function get($uri, $controller, $options = []) {
        $this->routes['GET'][$uri] = ['controller' => $controller, 'middleware' => $options['middleware'] ?? null];
    }

    public function post($uri, $controller, $options = []) {
        $this->routes['POST'][$uri] = ['controller' => $controller, 'middleware' => $options['middleware'] ?? null];
    }

    public function dispatch() {
        $uri = $this->getUri();
        $method = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes[$method] as $routeUri => $properties) {
            if ($uri == $routeUri) {
                $this->callAction(
                    ...explode('@', $properties['controller']),
                    $properties['middleware']
                );
                return;
            }
        }

        // Handle 404
        http_response_code(404);
        echo "404 Not Found";
    }

    protected function callAction($controller, $action, $middleware = null) {
        $controller = "App\\Controller\\$controller";
        if ($middleware) {
            // Handle middleware
        }
        (new $controller)->$action();
    }

    protected function getUri() {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }
}
