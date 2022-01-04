<?php
use TorMorten\Eventy\Facades\Events as Eventy;

if(!class_exists('ScriptsPageBuilder')) {
    class ScriptsPageBuilder
    {
        static $_inst = null;

        public function __construct()
        {
            Eventy::addAction('gmz_init_header', [$this, '_addStyle'], 20, 1);
            Eventy::addAction('gmz_init_footer', [$this, '_addScript'], 20, 1);
        }

        public function _addStyle()
        {
            $current_route = \Request::route()->getName();
            if ($current_route == 'builder') {
                echo '<link rel="stylesheet" href="' . url('plugins/PageBuilder/Assets/css/main.css') . '">';
            }
        }

        public function _addScript()
        {
            $current_route = \Request::route()->getName();
            if ($current_route == 'builder') {
                echo '<script src="' . url('plugins/PageBuilder/Assets/js/main.js') . '"></script>';
            }
            echo '<script src="' . url('plugins/PageBuilder/Assets/js/elements.js') . '"></script>';
        }

        public static function inst()
        {
            if (is_null(self::$_inst)) {
                self::$_inst = new self();
            }
            return self::$_inst;
        }
    }

    ScriptsPageBuilder::inst();
}