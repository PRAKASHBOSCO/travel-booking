<?php
/**
 * Created by PhpStorm.
 * User: Jream
 * Date: 12/5/2020
 * Time: 5:27 PM
 */
namespace App\Modules\Frontend\Controllers;
use App\Services\Contracts\IAvailabilityService;
use Illuminate\Http\Request;

class AvailabilityController{
	private $service;

	public function __construct(IAvailabilityService $_service) {
		$this->service = $_service;
	}
}