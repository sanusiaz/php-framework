<?php

    namespace DESIGN_PATTERN\Inc\Abstracts;

     abstract class Web {

        public $endpoints = [];
        protected $fqController;
        protected $method;
        public $data;

        public function __construct( $endpoints = [], $fqController = "", $method = "", $data = "" ) {
            $this->endpoints       = $endpoints;
            $this->fqController    = $fqController;
            $this->method          = $method;
            $this->data            = $data;
        }

        protected function __checkRequestMethod( string $method = 'GET' ): bool {
            if ( $_SERVER['REQUEST_METHOD'] === $method ) {
                return true;
            }
            return false;
        }

        protected function __checkRequestEnpoint(string $endpoint = '',  string $recentEndpoint = ""): bool {

            $explodedEndpoint = explode('/', $_SERVER['REQUEST_URI']);

            $explodedEndpoint = array_splice($explodedEndpoint, 1);

            // Register and prevent epoints to be used twice
            if ("/" . implode("/", $explodedEndpoint) === $recentEndpoint ) {
                $this->__setEndpointsToGlobal($explodedEndpoint);

                return true;
            }

            return false;
        }

       

        public function __checkIfEndpintIsRegistered(array $endpoints = []) {
            foreach ( $endpoints as $endpoint ) {
                if ( !empty( $endpoints ) && in_array( $endpoint, array_values($this->endpoints) ) )  {
                    return true;
                }
            }
            return false;
        }


        private function __setMethodToGlobal($method) {
            $this->method = $method;
        } 

        private function __setDataToGlobal($data) {
            $this->data = $data;
        }

        private function __setControllerToGlobal($fqController) {
            $this->fqController = $fqController;
        }

        public function __setEndpointsToGlobal(array $endpoints) {
            $this->endpoints[] = $endpoints;
        }

        public function __getDataAttributes() {
            return $this->data;
        }

        public function __getMethodAttributes() {
            return $this->method;
        }

        public function __getEndpointsAttributes() {
            return $this->endpoints;
        }

    }