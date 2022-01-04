<?php
if ( ! defined( 'GMZPATH' ) ) { exit; }
use App\Plugins\BluesnapGateway\Controllers\Bluesnap;
use TorMorten\Eventy\Facades\Events as Eventy;
if(!class_exists('GWBluesnap')) {
    class GWBluesnap
    {
        private static $_inst;

        public function __construct()
        {
            Eventy::addFilter('gmz_gateways', [$this, '_addGateway'], 20, 1);
        }

        public function _addGateway($gateways)
        {
            $obj = new Bluesnap();
            $gateways[$obj->getID()] = $obj;
            return $gateways;
        }

        public static function inst()
        {
            if (empty(self::$_inst)) {
                self::$_inst = new self();
            }
            return self::$_inst;
        }
    }

    GWBluesnap::inst();
}