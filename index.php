<?php




    if ( !defined ( 'DESIGN_PATTERN_DIR' ) ) {
        define ( 'DESIGN_PATTERN_DIR', dirname(__FILE__) );
    }


    require_once dirname(__FILE__) . '/inc/helpers/autoload.php';

    // load .env files 
    
    require_once dirname(__FILE__) . '/routes/web/app.php';
    require_once dirname(__FILE__) . '/routes/api/app.php';
