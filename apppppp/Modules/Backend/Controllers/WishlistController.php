<?php
namespace App\Modules\Backend\Controllers;

use App\Services\Contracts\IApartmentService;
use App\Services\Contracts\IBeautyService;
use App\Services\Contracts\ICarService;
use App\Services\Contracts\IHotelService;
use App\Services\Contracts\ISpaceService;
use App\Services\Contracts\ITourService;
use App\Services\Contracts\IWishlistService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WishlistController extends Controller{
    private $service;
    private $apartmentService;
    private $spaceService;
    private $carService;
    private $hotelService;
    private $beautyService;
    private $tourService;

    public function __construct(IWishlistService $service, IApartmentService $apartmentService, ISpaceService $spaceService, ICarService $carService, IHotelService $hotelService, IBeautyService $beautyService, ITourService $tourService){
        $this->service = $service;
        $this->apartmentService = $apartmentService;
        $this->spaceService = $spaceService;
        $this->carService = $carService;
        $this->hotelService = $hotelService;
        $this->beautyService = $beautyService;
        $this->tourService = $tourService;
    }

    public function wishlistAllView(){
        $services = get_services_enabled();
        if(!empty($services)){
            return response()->redirectTo(dashboard_url('wishlist/' . $services[0]));
        }
        return $this->getView($this->getFolderView('wishlist.all'));
    }

    public function wishlistView($post_type, Request $request){
        $services = get_services_enabled();
        if(in_array($post_type, $services)) {
            $wishlist = list_wishlist($post_type);
            $postTypeService = $post_type . 'Service';
            $data = $this->$postTypeService->getWishList(6, $wishlist);
            return $this->getView($this->getFolderView('wishlist.index'), ['posts' => $data, 'post_type' => $post_type]);
        }else {
            if (!empty($services)) {
                return response()->redirectTo(dashboard_url('wishlist/' . $services[0]));
            }
            return $this->getView($this->getFolderView('wishlist.all'));
        }
    }
}