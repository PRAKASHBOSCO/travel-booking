<?php

namespace App\Services\Contracts;

use Illuminate\Http\Request;

interface IAvailabilityService extends IBaseService
{
   public function getCarAvailability(Request $request);

   public function addCarAvailability(Request $request);

   public function getApartmentAvailability(Request $request);

   public function addApartmentAvailability(Request $request);

   public function getSpaceAvailability(Request $request);

   public function addSpaceAvailability(Request $request);

   public function getRoomAvailability(Request $request);

   public function addRoomAvailability(Request $request);

   public function addAgentAvailability(Request $request);

   public function getAgentAvailability(Request $request);

   public function addbeautyAvailability(Request $request);

   public function getbeautyAvailability(Request $request);
}

