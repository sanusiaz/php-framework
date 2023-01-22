<?php
    
    /**
     * LoginController
     *
     * @package design pattern
     * @author https://github.com/sanusiaz
     */
    namespace DESIGN_PATTERN\Inc\Controllers;
    use DESIGN_PATTERN\Inc\Controllers\Controller;
    use DESIGN_PATTERN\Inc\Controllers\AssetsController;
    use DESIGN_PATTERN\Inc\Services\HttpRequest;

    class LoginController extends Controller
    {
        use \DESIGN_PATTERN\Inc\Traits\Singleton;


        public function __invoke() {
            return AssetsController::views('login/index.html');
        }
    }