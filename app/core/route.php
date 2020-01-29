<?php
    class Route {
        static function start() {
            session_start();
            
            if (isset($_POST['action'])) {
                include('app/controllers/controller_post.php');
                Controller_Post::index($_POST);
            }

            $controller_name = 'Notes';
            $action_name = 'index';

            $routes = explode('/', $_SERVER['REQUEST_URI']);

            if (!empty($routes[1])) {
                $controller_name = $routes[1];
            }
            
            if (!empty($routes[2])) {
                $action_name = $routes[2];
            }

            $model_name = 'Model_' . $controller_name;
            $controller_name = 'Controller_' . $controller_name;

            $model_file = strtolower($model_name) . '.php';
            $model_path = 'app/models/' . $model_file;
            if (file_exists($model_path)) {
                include ($model_path);
            }

            $controller_file = strtolower($controller_name . '.php');
            $controller_path = 'app/controllers/' . $controller_file;
            if (file_exists($controller_path)) {
                include ($controller_path);
            } else {
                Route::ErrorPage404();
            }
            
            $controller = new $controller_name;
            $action = $action_name;
            if (method_exists($controller, $action)) {
                $controller->$action();
            } else {
                Route::ErrorPage404();
            }
        }
        static function ErrorPage404() {
            header('Location: /');
        }
    }
?>