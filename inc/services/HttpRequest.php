<?php

    namespace DESIGN_PATTERN\Inc\Services;

    class HttpRequest {
        public function __construct () {

        }

        public static function error() {
            return "Error Occurred";
        }

        public static function __404() {
            // TODO: pass 404 view here
            return "Not found";
        }

        public function __destruct() {
            // exit the code here
            exit();
        }

        public static function __methodNotFound($method, $stdClass) {
            die('Method ' . $method . ' Not found in ' . $stdClass);
        }

        public static function __invaidEndpoint(array $safeEndpoints = []) {
            die('Enpoints Not Found');
        }

        public static function __classNotFound($controller) {
            die('Class ' . $controller . ' Not Found');
        }

        public static function __viewsNotFound( $name ) {
            die('View ' . $name . ' Not Found in views folder');
        }
    }