<?php
if ( ! defined( 'GMZPATH' ) ) { exit; }
use App\Plugins\SkrillGateway\Controllers\Skrill;
use TorMorten\Eventy\Facades\Events as Eventy;
if(!class_exists('GWSkrill')) {
    class GWSkrill
    {
        private static $_inst;

        public function __construct()
        {
            Eventy::addFilter('gmz_gateways', [$this, '_addGateway'], 20, 1);
        }

        public function _addGateway($gateways)
        {
            $obj = new Skrill();
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

    GWSkrill::inst();
}