<?php
    
    namespace DESIGN_PATTERN\Inc\Controllers;
    use DESIGN_PATTERN\Inc\Controllers\AssetsController;
    use DESIGN_PATTERN\Inc\Services\HttpRequest;
    
    class Controller {

    
        public static function execute(string $method, $fqController) {


            // check if class exists 
            if ( class_exists($fqController) ) {

                $controller = new $fqController();

                if ( !empty( $method ) && method_exists( $controller, $method ) ) {
                    
                    AssetsController::get_instance();
                    return $controller->$method();
                }
                else {
                    HttpRequest::__methodNotFound($method, $fqController);
                }
            }
            else {
                HttpRequest::__classNotFound($fqController);
            }
        }
    }