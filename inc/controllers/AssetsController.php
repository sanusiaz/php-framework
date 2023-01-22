<?php
    
    /**
     * AssetsController
     *
     * @package design pattern
     * @author https://github.com/sanusiaz
     */
    namespace DESIGN_PATTERN\Inc\Controllers;
    use DESIGN_PATTERN\Inc\Controllers\Controller;
    use DESIGN_PATTERN\Inc\Services\HttpRequest;


    class AssetsController extends Controller
    {
        use \DESIGN_PATTERN\Inc\Traits\Singleton;

        public function __construct() {
            $this->setHooks();
        }

        private function setHooks() {
            // load all assets 
            
        }

        public static function views(string $name) {

            $subDir = explode( "/", $name );

            $newFilePath = $name;
            if ( is_array($subDir) && count($subDir) > 0 ) {

                // real file name
                $fileName = array_pop( $subDir );

                $newFilePath = "";
                foreach ( $subDir as $dir ) {
                    $newFilePath .= $dir . '/';
                }

                $newFilePath .= $fileName;

            }   

            if ( file_exists( DESIGN_PATTERN_DIR . '/views/' . $newFilePath ) ) {
                // require_once 
                echo file_get_contents(  DESIGN_PATTERN_DIR . '/views/' . $newFilePath );
            }

            else {
                HttpRequest::__viewsNotFound($name);
            }   
        }
    }