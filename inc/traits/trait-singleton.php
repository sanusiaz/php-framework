<?php

namespace DESIGN_PATTERN\Inc\Traits;

trait Singleton {
    public function __construct() {

    }


    public function __clone() {
        // Prevents Objects Clonning
    }

    public function __wakeup() {}
    public function __destruct() {}

    final public static function get_instance() {
        static $instance = [];

        $called_class = get_called_class();

        if ( !isset($instance[$called_class]) ) {
            $instance[$called_class] = new $called_class();

        } 

        return $instance[$called_class];
    }
}