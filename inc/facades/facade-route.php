<?php

    namespace DESIGN_PATTERN\Inc\Facades;

    use DESIGN_PATTERN\Inc\Abstracts\Web;
    use DESIGN_PATTERN\Inc\Services\HttpRequest;
    use DESIGN_PATTERN\Inc\Controllers\Controller;



    class Route extends Web {

        use \DESIGN_PATTERN\Inc\Traits\Singleton;

        private $recentEndpoint;

        public function __construct (  $recentEndpoint = '') {
            $this->recentEndpoint = $recentEndpoint;
        }


        /**
         * Make Routes and pass the required fully qualified controller
         * @param  [string] $endpoints    [endpoints to make from requst]
         * @param  [stdCllss] $fqController [fully qualified controller ]
         * @param  string $method       [method to display ]
         * @param  array  $data         [arrays of data to pass to the method]
         * @return [bool|void|string]             
         */
        protected function makeFromRoute( $endpoints, $fqController, $method = '__invoke', $data = [] ) {
            if ( $this->__checkRequestMethod('GET') ) {

                if ( $this->__checkRequestEnpoint($endpoints, $this->recentEndpoint) ) {

                    if ( $this->__checkIfEndpintIsRegistered( $this->endpoints ) === true ) {
                        Controller::execute( $method, $fqController );
                    }
                    else {
                        HttpRequest::__invaidEndpoint( $this->__getEndpointsAttributes() );
                    }

                   
                }
              

            }

            // load the 404 error page
            HttpRequest::__404();
        }

        public function get(  string $endpoints = "", string $fqController = "", string $method = '__invoke', array $data = [] ) {

            $this->recentEndpoint = $endpoints;
            $this->makeFromRoute($endpoints, $fqController, $method, $data = []);

            return false;
        }


       

    }