<?php
// Active le mode strict pour les types
declare(strict_types=1);
// Espace de noms du noyau
namespace Mini\Core;
// Déclare le routeur HTTP minimaliste
final class Router
{
    // Tableau des routes : [méthode, chemin, [ClasseContrôleur, action]]
    /** @var array<int, array{0:string,1:string,2:array{0:class-string,1:string}} > */
    private array $routes;

    /**
     * Initialise le routeur avec les routes configurées
     * @param array<int, array{0:string,1:string,2:array{0:class-string,1:string}} > $routes
     */
    public function __construct(array $routes)
    {
        // Mémorise les routes fournies
        $this->routes = $routes;

    }


    public function dispatch(string $method, string $uri): void
    {
      
        $path = parse_url($uri, PHP_URL_PATH) ?? '/';

      
        foreach ($this->routes as [$routeMethod, $routePath, $handler]) {
    
            if ($method === $routeMethod && $path === $routePath) {
        
                [$class, $action] = $handler;
                
                $controller = new $class();

                $controller->$action();
                return;
            }
            
        }

        // Si aucune route ne correspond, renvoie un 404 minimaliste
        http_response_code(404);
        echo '404 Not Found';
    }
}


