<?php

namespace App\Services;

use App\Repositories\Contracts\IAgentAvailabilityRepository;
use App\Repositories\Contracts\IAgentRepository;
use App\Repositories\Contracts\IApartmentAvailabilityRepository;
use App\Repositories\Contracts\IApartmentRepository;
use App\Repositories\Contracts\IBeautyAvailabilityRepository;
use App\Repositories\Contracts\IBeautyRepository;
use App\Repositories\Contracts\ITourAvailabilityRepository;
use App\Repositories\Contracts\ITourRepository;
use App\Repositories\Contracts\ISpaceAvailabilityRepository;
use App\Repositories\Contracts\ISpaceRepository;
use App\Repositories\Contracts\ICarAvailabilityRepository;
use App\Repositories\Contracts\ICarRepository;
use App\Repositories\Contracts\IHotelRepository;
use App\Repositories\Contracts\IRoomAvailabilityRepository;
use App\Repositories\Contracts\IRoomRepository;
use App\Services\Contracts\IAvailabilityService;
use Illuminate\Http\Request;
use TorMorten\Eventy\Facades\Eventy;

class AvailabilityService extends AbstractService implements IAvailabilityService
{
    protected $carAvaiRepo;
    protected $carRepo;
    protected $apartmentAvaiRepo;
    protected $apartmentRepo;
    protected $tourAvaiRepo;
    protected $tourRepo;
    protected $spaceAvaiRepo;
    protected $spaceRepo;
    protected $roomAvaiRepo;
    protected $roomRepo;
    protected $hotelRepo;
    protected $agentRepo;
    protected $agentAvaiRepo;
    protected $beautyRepo;
    protected $beautyAvaiRepo;

    public function __construct(
        ICarAvailabilityRepository $carAvaiRepo,
        ICarRepository $carRepo,
        IApartmentAvailabilityRepository $apartmentAvaiRepo,
        IApartmentRepository $apartmentRepo,
        ITourAvailabilityRepository $tourAvaiRepo,
        ITourRepository $tourRepo,
        ISpaceAvailabilityRepository $spaceAvaiRepo,
        ISpaceRepository $spaceRepo,
        IRoomAvailabilityRepository $roomAvaiRepo,
        IRoomRepository $roomRepo, IHotelRepository $hotelRepo,
        IAgentAvailabilityRepository $agentAvaiRepo,
        IAgentRepository $agentRepo,
        IBeautyRepository $beautyRepo,
        IBeautyAvailabilityRepository $beautyAvaiRepo)
    {
        $this->carAvaiRepo = $carAvaiRepo;
        $this->carRepo = $carRepo;
        $this->apartmentAvaiRepo = $apartmentAvaiRepo;
        $this->apartmentRepo = $apartmentRepo;
        $this->tourAvaiRepo = $tourAvaiRepo;
        $this->tourRepo = $tourRepo;
        $this->spaceAvaiRepo = $spaceAvaiRepo;
        $this->spaceRepo = $spaceRepo;
        $this->roomAvaiRepo = $roomAvaiRepo;
        $this->roomRepo = $roomRepo;
        $this->hotelRepo = $hotelRepo;
        $this->agentAvaiRepo = $agentAvaiRepo;
        $this->agentRepo = $agentRepo;
        $this->beautyRepo = $beautyRepo;
        $this->beautyAvaiRepo = $beautyAvaiRepo;
    }

    public function addAgentAvailability(Request $request)
    {
        $check_in = $request->post('calendar_check_in', '');
        $check_out = $request->post('calendar_check_out', '');

        if (empty($check_in) or empty($check_out)) {
            return [
                'status' => false,
                'type' => 'error',
                'message' => __('The check in or check out field is not empty.')
            ];
        }

        $check_in = strtotime($check_in);
        $check_out = strtotime($check_out);
        if ($check_in > $check_out) {
            return [
                'status' => false,
                'type' => 'error',
                'message' => __('The check out is later than the check in field.')
            ];
        }

        $status = $request->post('calendar_status', 'unavailable');
        $post_id = $request->post('calendar_post_id', '');

        if ($status == 'remove') {
            for ($i = $check_in; $i <= $check_out; $i = strtotime('+1 day', $i)) {
                $this->agentAvaiRepo->deleteByWhere([
                    'check_in' => $i
                ]);
            }
            return [
                'status' => true,
                'type' => 'success',
                'message' => __('Remove unavailability successfully')
            ];
        }

        for ($i = $check_in; $i <= $check_out; $i = strtotime('+1 day', $i)) {
            $data = [
                'post_id' => $post_id,
                'check_in' => $i,
                'check_out' => $i,
                'status' => $status
            ];
            $this->agentAvaiRepo->insertOrUpdate($data);
        }

        return [
            'status' => true,
            'type' => 'success',
            'message' => __('Successfully')
        ];
    }

    public function getAgentAvailability(Request $request)
    {
        $results = [];
        $agent_service = $request->post('agent_service', '');
        $post_id = $request->post('post_id', '');
        $check_in = $request->post('start', '');
        $check_out = $request->post('end', '');

        if (!empty($post_id) and !empty($check_in) and !empty($check_out)) {
            $data = $this->agentAvaiRepo->getDataAvailability($post_id, $check_in, $check_out, $agent_service);

            if (!$data->isEmpty()) {
                foreach ($data as $key => $val) {
                    $results[] = [
                        'id' => $val['check_in'],
                        'title' => 'Agent',
                        'start' => date('Y-m-d', $val['check_in']),
                        'status' => $val['status'],
                        'is_base' => 0
                    ];
                }
            }
        }
        return $results;
    }

    public function addRoomAvailability(Request $request)
    {
        $hotel_id = $request->post('calendar_hotel_id', '');
        $hotel_hashing = $request->post('calendar_hotel_hashing', '');
        $post_id = $request->post('calendar_post_id', '');

        if (empty($hotel_id) || !gmz_compare_hashing($hotel_id, $hotel_hashing) || empty($post_id)) {
            return [
                'status' => false,
                'type' => 'error',
                'message' => __('Data is invalid.')
            ];
        }

        $check_in = $request->post('calendar_check_in', '');
        $check_out = $request->post('calendar_check_out', '');

        if (empty($check_in) or empty($check_out)) {
            return [
                'status' => false,
                'type' => 'error',
                'message' => __('The check in or check out field is not empty.')
            ];
        }

        $check_in = strtotime($check_in);
        $check_out = strtotime($check_out);
        if ($check_in > $check_out) {
            return [
                'status' => false,
                'type' => 'error',
                'message' => __('The check out is later than the check in field.')
            ];
        }

        $status = $request->post('calendar_status', 'available');
        if ($status == 'remove') {
            for ($i = $check_in; $i <= $check_out; $i = strtotime('+1 day', $i)) {
                $this->roomAvaiRepo->removeCalendarItem($post_id, $i);
            }
            return [
                'status' => true,
                'type' => 'success',
                'message' => __('Remove custom price successfully')
            ];
        }

        $price = $request->post('calendar_price', '');
        if ($status == 'available') {
            if (empty($price)) {
                return [
                    'status' => false,
                    'type' => 'error',
                    'message' => __('The price field is required.')
                ];
            }
            if (filter_var($price, FILTER_VALIDATE_FLOAT) === false) {
                return [
                    'status' => false,
                    'type' => 'error',
                    'message' => __('The price field is not a number.')
                ];
            }
        }
        $number_room = $request->post('calendar_number_room', '');
        if (filter_var($number_room, FILTER_VALIDATE_INT) === false) {
            $number_room = '';
        }
        if (empty($price))
            $price = '';

        $room_object = $this->roomRepo->find($post_id);
        $all_rooms = $this->roomRepo->where([
            'hotel_id' => $hotel_id,
            'status' => 'publish'
        ]);

        $countUpdate = 0;
        for ($i = $check_in; $i <= $check_out; $i = strtotime('+1 day', $i)) {
            $availExists = $this->roomAvaiRepo->where([
                'post_id' => $post_id,
                'check_in' => $i
            ], true);
            if (!$availExists) {
                $data = [
                    'post_id' => $post_id,
                    'hotel_id' => $hotel_id,
                    'total_room' => count($all_rooms),
                    'adult_number' => $room_object['number_of_adult'],
                    'child_number' => $room_object['number_of_children'],
                    'check_in' => $i,
                    'check_out' => $i,
                    'price' => $price,
                    'status' => $status,
                    'number' => $room_object['number_of_room'],
                    'booked' => 0,
                    'is_base' => 0
                ];
                $this->roomAvaiRepo->create($data);
                $countUpdate++;
            } else {
                $updated = $this->roomAvaiRepo->updateByWhere([
                    'post_id' => $post_id,
                    'check_in' => $i
                ], [
                    'price' => $price,
                    'status' => $status,
                    'is_base' => 0
                ]);
                if ($updated) {
                    $countUpdate++;
                }
            }
        }

        if ($countUpdate > 0) {
            return [
                'status' => true,
                'type' => 'success',
                'message' => __('Successfully')
            ];
        } else {
            return [
                'status' => false,
                'type' => 'error',
                'message' => __('No records have been updated')
            ];
        }
    }

    public function getRoomAvailability(Request $request)
    {
        $results = [];
        $post_id = $request->post('post_id', '');
        $check_in = $request->post('start', '');
        $check_out = $request->post('end', '');

        if (!empty($post_id) and !empty($check_in) and !empty($check_out)) {
            $room = $this->roomRepo->find($post_id);
            $basePrice = $room->base_price;
            $data = $this->roomAvaiRepo->getDataAvailability($post_id, $check_in, $check_out);

            if (!$data->isEmpty()) {
                foreach ($data as $key => $val) {
                    $resultItem = [
                        'id' => $val['check_in'],
                        'title' => 'Room',
                        'start' => date('Y-m-d', $val['check_in']),
                        'price' => floatval($val['price']),
                        'status' => $val['status'],
                        'is_base' => 0
                    ];
                    if ($val['status'] == 'available') {
                        if ($val['number'] == $val['booked']) {
                            $resultItem['status'] = 'booked';
                        } elseif ($val['booked'] > 0) {
                            if ($val['price'] != $basePrice) {
                                $resultItem['status'] = 'on-booking-price';
                            } else {
                                $resultItem['status'] = 'on-booking';
                            }
                        }
                    }
                    $results[] = $resultItem;
                }
            }
        }
        return $results;
    }

    public function addApartmentAvailability(Request $request)
    {
        $check_in = $request->post('calendar_check_in', '');
        $check_out = $request->post('calendar_check_out', '');
        $post_id = $request->post('calendar_post_id', '');

        if (empty($check_in) or empty($check_out) || empty($post_id)) {
            return [
                'status' => false,
                'type' => 'error',
                'message' => __('The check in or check out field is not empty.')
            ];
        }

        $check_in = strtotime($check_in);
        $check_out = strtotime($check_out);
        if ($check_in > $check_out) {
            return [
                'status' => false,
                'type' => 'error',
                'message' => __('The check out is later than the check in field.')
            ];
        }

        $status = $request->post('calendar_status', 'available');
        if ($status == 'remove') {
            for ($i = $check_in; $i <= $check_out; $i = strtotime('+1 day', $i)) {
                $this->apartmentAvaiRepo->removeCalendarItem($post_id, $i);
            }
            return [
                'status' => true,
                'type' => 'success',
                'message' => __('Remove custom price successfully')
            ];
        }

        $price = $request->post('calendar_price', '');
        if ($status == 'available') {
            if (empty($price)) {
                return [
                    'status' => false,
                    'type' => 'error',
                    'message' => __('The price field is required.')
                ];
            }
            if (filter_var($price, FILTER_VALIDATE_FLOAT) === false) {
                return [
                    'status' => false,
                    'type' => 'error',
                    'message' => __('The price field is not a number.')
                ];
            }
        }

        if (empty($price))
            $price = '';

        $countUpdate = 0;
        for ($i = $check_in; $i <= $check_out; $i = strtotime('+1 day', $i)) {
            $availExists = $this->apartmentAvaiRepo->where([
                'post_id' => $post_id,
                'check_in' => $i
            ], true);
            if (!$availExists) {
                $data = [
                    'post_id' => $post_id,
                    'check_in' => $i,
                    'check_out' => $i,
                    'price' => $price,
                    'status' => $status,
                    'booked' => 0,
                    'is_base' => 0
                ];
                $this->apartmentAvaiRepo->create($data);
                $countUpdate++;
            } else {
                $updated = $this->apartmentAvaiRepo->updateByWhere([
                    'post_id' => $post_id,
                    'check_in' => $i
                ], [
                    'price' => $price,
                    'status' => $status,
                    'is_base' => 0
                ]);
                if ($updated) {
                    $countUpdate++;
                }
            }
        }

        if ($countUpdate > 0) {
            return [
                'status' => true,
                'type' => 'success',
                'message' => __('Successfully')
            ];
        } else {
            return [
                'status' => false,
                'type' => 'error',
                'message' => __('No records have been updated')
            ];
        }
    }

    public function getApartmentAvailability(Request $request)
    {
        $results = [];
        $post_id = $request->post('post_id', '');
        $check_in = $request->post('start', '');
        $check_out = $request->post('end', '');

        if (!empty($post_id) and !empty($check_in) and !empty($check_out)) {
            $data = $this->apartmentAvaiRepo->getDataAvailabilityForCalendar($post_id, $check_in, $check_out);

            if (!$data->isEmpty()) {
                foreach ($data as $key => $val) {
                    $resultItem = [
                        'id' => $val['check_in'],
                        'title' => 'Apartment',
                        'start' => date('Y-m-d', $val['check_in']),
                        'price' => floatval($val['price']),
                        'status' => $val['status'],
                        'is_base' => 0
                    ];
                    if ($val['status'] == 'available') {
                        if (!empty($val['booked'])) {
                            $resultItem['status'] = 'booked';
                        }
                    }
                    $results[] = $resultItem;
                }
            }
        }
        return $results;
    }

    public function addTourAvailability(Request $request)
    {
        $check_in = $request->post('calendar_check_in', '');
        $check_out = $request->post('calendar_check_out', '');
        $post_id = $request->post('calendar_post_id', '');

        if (empty($check_in) || empty($check_out)) {
            return [
                'status' => false,
                'type' => 'error',
                'message' => __('The check in or check out field is not empty.')
            ];
        }

        $check_in = strtotime($check_in);
        $check_out = strtotime($check_out);
        if ($check_in > $check_out) {
            return [
                'status' => false,
                'type' => 'error',
                'message' => __('The check out is later than the check in field.')
            ];
        }

        $status = $request->post('calendar_status', 'available');
        if ($status == 'remove') {
            for ($i = $check_in; $i <= $check_out; $i = strtotime('+1 day', $i)) {
                $this->tourAvaiRepo->removeCalendarItem($post_id, $i);
            }
            return [
                'status' => true,
                'type' => 'success',
                'message' => __('Remove custom price successfully')
            ];
        }

        $adult_price = $request->post('calendar_adult_price', 0);
        $children_price = $request->post('calendar_children_price', 0);
        $infant_price = $request->post('calendar_infant_price', 0);
        $group_size = $request->post('calendar_group_size', 1);
        if ($status == 'available') {
            if (empty($adult_price)) {
                return [
                    'status' => false,
                    'type' => 'error',
                    'message' => __('The adult price field is required.')
                ];
            }
            if (filter_var($adult_price, FILTER_VALIDATE_FLOAT) === false) {
                return [
                    'status' => false,
                    'type' => 'error',
                    'message' => __('The adult price field is not a number.')
                ];
            }
            if (filter_var($children_price, FILTER_VALIDATE_FLOAT) === false) {
                return [
                    'status' => false,
                    'type' => 'error',
                    'message' => __('The children price field is not a number.')
                ];
            }
            if (filter_var($infant_price, FILTER_VALIDATE_FLOAT) === false) {
                return [
                    'status' => false,
                    'type' => 'error',
                    'message' => __('The infant price field is not a number.')
                ];
            }
            if (filter_var($group_size, FILTER_VALIDATE_FLOAT) === false) {
                return [
                    'status' => false,
                    'type' => 'error',
                    'message' => __('The group size field is not a number.')
                ];
            }

        }

        if (empty($adult_price))
            $adult_price = 0;

        if (empty($children_price))
            $children_price = 0;

        if (empty($infant_price))
            $infant_price = 0;

        if (empty($group_size))
            $group_size = 0;

        $tourObject = $this->tourRepo->find($post_id);
        $countUpdate = 0;
        for ($i = $check_in; $i <= $check_out; $i = strtotime('+1 day', $i)) {
            $availExists = $this->tourAvaiRepo->where([
                'post_id' => $post_id,
                'check_in' => $i
            ], true);
            if (!$availExists) {
                $data = [
                    'post_id' => $post_id,
                    'check_in' => $i,
                    'check_out' => $i,
                    'adult_price' => $adult_price,
                    'children_price' => $children_price,
                    'infant_price' => $infant_price,
                    'group_size' => $group_size,
                    'status' => $status,
                    'booked' => 0,
                    'is_base' => 0
                ];
                $this->tourAvaiRepo->create($data);
                $countUpdate++;
            } else {
                $updated = $this->tourAvaiRepo->updateByWhere([
                    'post_id' => $post_id,
                    'check_in' => $i
                ], [
                    'adult_price' => $adult_price,
                    'children_price' => $children_price,
                    'infant_price' => $infant_price,
                    'group_size' => $group_size,
                    'status' => $status,
                    'is_base' => 0
                ]);
                if ($updated) {
                    $countUpdate++;
                }
            }
        }

        Eventy::action('gmz_after_add_tour_availability', $request->all());

        if ($countUpdate > 0) {
            return [
                'status' => true,
                'type' => 'success',
                'message' => __('Successfully')
            ];
        } else {
            return [
                'status' => false,
                'type' => 'error',
                'message' => __('No records have been updated')
            ];
        }
    }

    public function getTourAvailability(Request $request)
    {
        $results = [];
        $post_id = $request->post('post_id', '');
        $check_in = $request->post('start', '');
        $check_out = $request->post('end', '');

        if (!empty($post_id) and !empty($check_in) and !empty($check_out)) {
            $data = $this->tourAvaiRepo->getDataAvailabilityForCalendar($post_id, $check_in, $check_out);
            if (!$data->isEmpty()) {
                foreach ($data as $key => $val) {
                    $resultItem = [
                        'id' => $val['check_in'],
                        'title' => 'Tour',
                        'start' => date('Y-m-d', $val['check_in']),
                        'adult_price' => floatval($val['adult_price']),
                        'children_price' => floatval($val['children_price']),
                        'infant_price' => floatval($val['infant_price']),
                        'group_size' => intval($val['group_size']),
                        'status' => $val['status'],
                        'is_base' => $val['is_base']
                    ];

                    if ($val['status'] == 'available') {
                        if ($val['group_size'] == $val['booked']) {
                            $resultItem['status'] = 'booked';
                        } else {
                            if ($val['booked'] > 0) {
                                if ($val['is_base'] == 1) {
                                    $resultItem['status'] = 'on-booking';
                                } else {
                                    $resultItem['status'] = 'on-booking-price';
                                }
                            }
                        }
                    }
                    $results[] = $resultItem;
                }
            }
            $results = Eventy::filter('gmz_tour_availability', $results, $data);
        }
        return $results;
    }

    public function addSpaceAvailability(Request $request)
    {
        $check_in = $request->post('calendar_check_in', '');
        $check_out = $request->post('calendar_check_out', '');
        $post_id = $request->post('calendar_post_id', '');

        if (empty($check_in) or empty($check_out)) {
            return [
                'status' => false,
                'type' => 'error',
                'message' => __('The check in or check out field is not empty.')
            ];
        }

        $check_in = strtotime($check_in);
        $check_out = strtotime($check_out);
        if ($check_in > $check_out) {
            return [
                'status' => false,
                'type' => 'error',
                'message' => __('The check out is later than the check in field.')
            ];
        }

        $status = $request->post('calendar_status', 'available');
        if ($status == 'remove') {
            for ($i = $check_in; $i <= $check_out; $i = strtotime('+1 day', $i)) {
                $this->spaceAvaiRepo->removeCalendarItem($post_id, $i);
            }
            return [
                'status' => true,
                'type' => 'success',
                'message' => __('Remove custom price successfully')
            ];
        }

        $price = $request->post('calendar_price', '');
        if ($status == 'available') {
            if (empty($price)) {
                return [
                    'status' => false,
                    'type' => 'error',
                    'message' => __('The price field is required.')
                ];
            }
            if (filter_var($price, FILTER_VALIDATE_FLOAT) === false) {
                return [
                    'status' => false,
                    'type' => 'error',
                    'message' => __('The price field is not a number.')
                ];
            }
        }

        if (empty($price))
            $price = '';

        $countUpdate = 0;
        for ($i = $check_in; $i <= $check_out; $i = strtotime('+1 day', $i)) {
            $availExists = $this->spaceAvaiRepo->where([
                'post_id' => $post_id,
                'check_in' => $i
            ], true);

            if (!$availExists) {
                $data = [
                    'post_id' => $post_id,
                    'check_in' => $i,
                    'check_out' => $i,
                    'price' => $price,
                    'status' => $status,
                    'booked' => 0,
                    'is_base' => 0
                ];
                $this->spaceAvaiRepo->create($data);
                $countUpdate++;
            } else {
                $updated = $this->spaceAvaiRepo->updateByWhere([
                    'post_id' => $post_id,
                    'check_in' => $i
                ], [
                    'price' => $price,
                    'status' => $status,
                    'is_base' => 0
                ]);
                if ($updated) {
                    $countUpdate++;
                }
            }
        }

        if ($countUpdate > 0) {
            return [
                'status' => true,
                'type' => 'success',
                'message' => __('Successfully')
            ];
        } else {
            return [
                'status' => false,
                'type' => 'error',
                'message' => __('No records have been updated')
            ];
        }
    }

    public function getSpaceAvailability(Request $request)
    {
        $results = [];
        $post_id = $request->post('post_id', '');
        $check_in = $request->post('start', '');
        $check_out = $request->post('end', '');

        if (!empty($post_id) and !empty($check_in) and !empty($check_out)) {
            $data = $this->spaceAvaiRepo->getDataAvailability($post_id, $check_in, $check_out);

            if (!$data->isEmpty()) {
                foreach ($data as $key => $val) {
                    $resultItem = [
                        'id' => $val['check_in'],
                        'title' => 'Space',
                        'start' => date('Y-m-d', $val['check_in']),
                        'price' => floatval($val['price']),
                        'status' => $val['status'],
                        'is_base' => 0
                    ];
                    if ($val['status'] == 'available') {
                        if (!empty($val['booked'])) {
                            $resultItem['status'] = 'booked';
                        }
                    }
                    $results[] = $resultItem;
                }
            }
        }
        return $results;
    }

    public function addCarAvailability(Request $request)
    {
        $check_in = $request->post('calendar_check_in', '');
        $check_out = $request->post('calendar_check_out', '');
        $post_id = $request->post('calendar_post_id', '');

        if (empty($check_in) or empty($check_out)) {
            return [
                'status' => false,
                'type' => 'error',
                'message' => __('The check in or check out field is not empty.')
            ];
        }

        $check_in = strtotime($check_in);
        $check_out = strtotime($check_out);
        if ($check_in > $check_out) {
            return [
                'status' => false,
                'type' => 'error',
                'message' => __('The check out is later than the check in field.')
            ];
        }

        $status = $request->post('calendar_status', 'available');
        if ($status == 'remove') {
            for ($i = $check_in; $i <= $check_out; $i = strtotime('+1 day', $i)) {
                $this->carAvaiRepo->removeCalendarItem($post_id, $i);
            }
            return [
                'status' => true,
                'type' => 'success',
                'message' => __('Remove custom price successfully')
            ];
        }

        $price = $request->post('calendar_price', '');
        if ($status == 'available') {
            if (empty($price)) {
                return [
                    'status' => false,
                    'type' => 'error',
                    'message' => __('The price field is required.')
                ];
            }
            if (filter_var($price, FILTER_VALIDATE_FLOAT) === false) {
                return [
                    'status' => false,
                    'type' => 'error',
                    'message' => __('The price field is not a number.')
                ];
            }
        }

        $carObject = $this->carRepo->find($post_id);
        $number = $carObject['quantity'];

        if (empty($price))
            $price = '';

        $countUpdate = 0;
        for ($i = $check_in; $i <= $check_out; $i = strtotime('+1 day', $i)) {
            $availExists = $this->carAvaiRepo->where([
                'post_id' => $post_id,
                'check_in' => $i
            ], true);
            if (!$availExists) {
                $data = [
                    'post_id' => $post_id,
                    'check_in' => $i,
                    'check_out' => $i,
                    'price' => $price,
                    'status' => $status,
                    'number' => $number,
                    'booked' => 0,
                    'is_base' => 0
                ];

                $this->carAvaiRepo->create($data);
                $countUpdate++;
            }else{
                $updated = $this->carAvaiRepo->updateByWhere([
                    'post_id' => $post_id,
                    'check_in' => $i
                ], [
                    'price' => $price,
                    'status' => $status,
                    'is_base' => 0
                ]);
                if ($updated) {
                    $countUpdate++;
                }
            }
        }

        if ($countUpdate > 0) {
            return [
                'status' => true,
                'type' => 'success',
                'message' => __('Successfully')
            ];
        } else {
            return [
                'status' => false,
                'type' => 'error',
                'message' => __('No records have been updated')
            ];
        }
    }

    public function getCarAvailability(Request $request)
    {
        $results = [];
        $post_id = $request->post('post_id', '');
        $check_in = $request->post('start', '');
        $check_out = $request->post('end', '');

        if (!empty($post_id) and !empty($check_in) and !empty($check_out)) {
            $data = $this->carAvaiRepo->getDataAvailability($post_id, $check_in, $check_out);

            if (!$data->isEmpty()) {
                foreach ($data as $key => $val) {
                    $resultItem = [
                        'id' => $val['check_in'],
                        'title' => 'Car',
                        'start' => date('Y-m-d', $val['check_in']),
                        'price' => floatval($val['price']),
                        'status' => $val['status'],
                        'is_base' => 0
                    ];

                    if ($val['status'] == 'available') {
                        if ($val['number'] == $val['booked']) {
                            $resultItem['status'] = 'booked';
                        } else {
                            if ($val['booked'] > 0) {
                                if ($val['is_base'] == 1) {
                                    $resultItem['status'] = 'on-booking';
                                } else {
                                    $resultItem['status'] = 'on-booking-price';
                                }
                            }
                        }
                    }
                    $results[] = $resultItem;
                }
            }
        }
        return $results;
    }

    public function addBeautyAvailability(Request $request)
    {
        $check_in = $request->post('calendar_check_in', '');
        $check_out = $request->post('calendar_check_out', '');

        if (empty($check_in) or empty($check_out)) {
            return [
                'status' => false,
                'type' => 'error',
                'message' => __('The check in or check out field is not empty.')
            ];
        }

        $check_in = strtotime($check_in);
        $check_out = strtotime($check_out);
        if ($check_in > $check_out) {
            return [
                'status' => false,
                'type' => 'error',
                'message' => __('The check out is later than the check in field.')
            ];
        }

        $status = $request->post('calendar_status', 'available');
        if ($status == 'remove') {
            for ($i = $check_in; $i <= $check_out; $i = strtotime('+1 day', $i)) {
                $this->beautyAvaiRepo->deleteByWhere([
                    'check_in' => $i
                ]);
            }
            return [
                'status' => true,
                'type' => 'success',
                'message' => __('Remove custom price successfully')
            ];
        }

        $price = $request->post('calendar_price', '');
        if ($status == 'available') {
            if (empty($price)) {
                return [
                    'status' => false,
                    'type' => 'error',
                    'message' => __('The price field is required.')
                ];
            }
            if (filter_var($price, FILTER_VALIDATE_FLOAT) === false) {
                return [
                    'status' => false,
                    'type' => 'error',
                    'message' => __('The price field is not a number.')
                ];
            }
        }
        $post_id = $request->post('calendar_post_id', '');
        $number = 20;

        if (empty($price))
            $price = '';

        for ($i = $check_in; $i <= $check_out; $i = strtotime('+1 day', $i)) {
            $data = [
                'post_id' => $post_id,
                'check_in' => $i,
                'check_out' => $i,
                'price' => $price,
                'status' => $status,
                'number' => $number,
                'booked' => 0
            ];
            $this->beautyAvaiRepo->insertOrUpdate($data);
        }

        return [
            'status' => true,
            'type' => 'success',
            'message' => __('Successfully')
        ];
    }

    public function getBeautyAvailability(Request $request)
    {
        $results = [];
        $post_id = $request->post('post_id', '');
        $check_in = $request->post('start', '');
        $check_out = $request->post('end', '');

        if (!empty($post_id) and !empty($check_in) and !empty($check_out)) {
            $data = $this->beautyAvaiRepo->getDataAvailability($post_id, $check_in, $check_out);

            if (!$data->isEmpty()) {
                foreach ($data as $key => $val) {
                    $results[] = [
                        'id' => $val['check_in'],
                        'title' => 'Car',
                        'start' => date('Y-m-d', $val['check_in']),
                        'price' => floatval($val['price']),
                        'status' => $val['status'],
                        'is_base' => 0
                    ];
                }
            }
        }
        return $results;
    }
}