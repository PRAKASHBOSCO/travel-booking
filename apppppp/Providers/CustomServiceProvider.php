<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 11/26/20
 * Time: 09:44
 */

namespace App\Providers;


use App\Repositories\BeautyRepository;
use App\Repositories\Contracts\IBeautyRepository;
use App\Repositories\Contracts\ITourAvailabilityRepository;
use App\Repositories\Contracts\IWithdrawalRepository;
use App\Services\AgentService;
use App\Services\ApartmentService;
use App\Services\Contracts\ISeoService;
use App\Services\Contracts\IWishlistService;
use App\Services\SeoService;
use App\Services\TourService;
use App\Services\SpaceService;
use App\Services\AvailabilityService;
use App\Services\BeautyService;
use App\Services\CarService;
use App\Services\CommentService;
use App\Services\Contracts\IAgentService;
use App\Services\Contracts\IApartmentService;
use App\Services\Contracts\ITourService;
use App\Services\Contracts\ISpaceService;
use App\Services\Contracts\IAvailabilityService;
use App\Services\Contracts\IBeautyService;
use App\Services\Contracts\ICarService;
use App\Services\Contracts\ICommentService;
use App\Services\Contracts\ICouponService;
use App\Services\Contracts\IEarningsReportService;
use App\Services\Contracts\IHotelService;
use App\Services\Contracts\ILanguageService;
use App\Services\Contracts\IMediaService;
use App\Services\Contracts\IMenuService;
use App\Services\Contracts\IMenuStructureService;
use App\Services\Contracts\INotificationService;
use App\Services\Contracts\IOptionService;
use App\Services\Contracts\IOrderService;
use App\Services\Contracts\IPageService;
use App\Services\Contracts\IPaymentService;
use App\Services\Contracts\IPostService;
use App\Services\Contracts\IRoomService;
use App\Services\Contracts\ITaxonomyService;
use App\Services\Contracts\ITermRelationService;
use App\Services\Contracts\ITermService;
use App\Services\Contracts\IUserService;
use App\Services\Contracts\IWithdrawalService;
use App\Services\CouponService;
use App\Services\EarningsReportService;
use App\Services\HotelService;
use App\Services\LanguageService;
use App\Services\MediaService;
use App\Services\MenuService;
use App\Services\MenuStructureService;
use App\Services\NotificationService;
use App\Services\OptionService;
use App\Services\OrderService;
use App\Services\PageService;
use App\Services\PostService;
use App\Services\RoomService;
use App\Services\TaxonomyService;
use App\Services\TermRelationService;
use App\Services\TermService;
use App\Services\UserService;
use App\Services\WishlistService;
use App\Services\WithdrawalService;
use App\Services\Contracts\ICategoriesService;
use App\Services\CategoriesService;
use Illuminate\Support\ServiceProvider;

class CustomServiceProvider extends ServiceProvider
{
   public function register()
   {
      $this->app->bind(IPostService::class, function () {
         return app()->make(PostService::class);
      });
      $this->app->bind(ITermRelationService::class, function () {
         return app()->make(TermRelationService::class);
      });
      $this->app->bind(ITermService::class, function () {
         return app()->make(TermService::class);
      });
       $this->app->bind(IHotelService::class, function () {
           return app()->make(HotelService::class);
       });
       $this->app->bind(IRoomService::class, function () {
           return app()->make(RoomService::class);
       });
      $this->app->bind(ICarService::class, function () {
         return app()->make(CarService::class);
      });
       $this->app->bind(IApartmentService::class, function () {
           return app()->make(ApartmentService::class);
       });
       $this->app->bind(ITourService::class, function () {
           return app()->make(TourService::class);
       });
      $this->app->bind(ISpaceService::class, function () {
         return app()->make(SpaceService::class);
      });
      $this->app->bind(IMediaService::class, function () {
         return app()->make(MediaService::class);
      });
      $this->app->bind(IPageService::class, function () {
         return app()->make(PageService::class);
      });
      $this->app->bind(ITaxonomyService::class, function () {
         return app()->make(TaxonomyService::class);
      });
      $this->app->bind(IOptionService::class, function () {
         return app()->make(OptionService::class);
      });
      $this->app->bind(IUserService::class, function () {
         return app()->make(UserService::class);
      });
      $this->app->bind(IAvailabilityService::class, function () {
         return app()->make(AvailabilityService::class);
      });
      $this->app->bind(IMenuService::class, function () {
         return app()->make(MenuService::class);
      });
      $this->app->bind(IMenuStructureService::class, function () {
         return app()->make(MenuStructureService::class);
      });
      $this->app->bind(ILanguageService::class, function () {
         return app()->make(LanguageService::class);
      });
       $this->app->bind(IOrderService::class, function () {
           return app()->make(OrderService::class);
       });
      $this->app->bind(ICommentService::class, function () {
         return app()->make(CommentService::class);
      });
      $this->app->bind(IEarningsReportService::class, function () {
         return app()->make(EarningsReportService::class);
      });
      $this->app->bind(IWithdrawalService::class, function () {
         return app()->make(WithdrawalService::class);
      });
       $this->app->bind(ICouponService::class, function () {
           return app()->make(CouponService::class);
       });
       $this->app->bind(INotificationService::class, function () {
           return app()->make(NotificationService::class);
       });
      $this->app->bind(IBeautyService::class, function () {
         return app()->make(BeautyService::class);
      });
       $this->app->bind(IAgentService::class, function () {
           return app()->make(AgentService::class);
       });

       $this->app->bind(IWishlistService::class, function () {
           return app()->make(WishlistService::class);
       });
       $this->app->bind(ISeoService::class, function () {
           return app()->make(SeoService::class);
       });
       $this->app->bind(ICategoriesService::class, function () {
         return app()->make(CategoriesService::class);
      });

   }

   public function provides()
   {
      return [
         IPostService::class,
         ITermRelationService::class,
         ITermService::class,
         IHotelService::class,
         IRoomService::class,
         ICarService::class,
         IApartmentService::class,
         ITourService::class,
         ISpaceService::class,
         IMediaService::class,
         IPageService::class,
         ITaxonomyService::class,
         IOptionService::class,
         IUserService::class,
         IAvailabilityService::class,
         IMenuService::class,
         IMenuStructureService::class,
         ILanguageService::class,
         IOrderService::class,
         ICommentService::class,
         IEarningsReportService::class,
         ICouponService::class,
         IWithdrawalService::class,
         INotificationService::class,
         IBeautyService::class,
         IAgentService::class,
         IWishlistService::class,
           ICategoriesService::class,
          ISeoService::class
      ];
   }
}