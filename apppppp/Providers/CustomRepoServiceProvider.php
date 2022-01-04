<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 11/26/20
 * Time: 09:44
 */

namespace App\Providers;


use App\Models\Agent;
use App\Models\AgentAvailability;
use App\Models\AgentRelation;
use App\Models\Apartment;
use App\Models\ApartmentAvailability;
use App\Models\BeautyAvailability;
use App\Models\Seo;
use App\Models\Tour;
use App\Models\TourAvailability;
use App\Models\Space;
use App\Models\SpaceAvailability;
use App\Models\Beauty;
use App\Models\Car;
use App\Models\CarAvailability;
use App\Models\Comment;
use App\Models\Coupon;
use App\Models\Earnings;
use App\Models\Hotel;
use App\Models\Language;
use App\Models\Media;
use App\Models\Menu;
use App\Models\MenuStructure;
use App\Models\Notification;
use App\Models\Option;
use App\Models\Order;
use App\Models\Page;
use App\Models\Post;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\Room;
use App\Models\RoomAvailability;
use App\Models\Taxonomy;
use App\Models\Term;
use App\Models\TermRelation;
use App\Models\User;
use App\Models\Wishlist;
use App\Models\Withdrawal;
use App\Models\Categories;
use App\Repositories\AgentAvailabilityRepository;
use App\Repositories\AgentRelationRepository;
use App\Repositories\AgentRepository;
use App\Repositories\ApartmentAvailabilityRepository;
use App\Repositories\ApartmentRepository;
use App\Repositories\BeautyAvailabilityRepository;
use App\Repositories\Contracts\IAgentRelationRepository;
use App\Repositories\Contracts\IBeautyAvailabilityRepository;
use App\Repositories\Contracts\ISeoRepository;
use App\Repositories\Contracts\IWishlistRepository;
use App\Repositories\SeoRepository;
use App\Repositories\TourAvailabilityRepository;
use App\Repositories\TourRepository;
use App\Repositories\SpaceAvailabilityRepository;
use App\Repositories\SpaceRepository;
use App\Repositories\BeautyRepository;
use App\Repositories\CarAvailabilityRepository;
use App\Repositories\CarRepository;
use App\Repositories\CommentRepository;
use App\Repositories\Contracts\IAgentAvailabilityRepository;
use App\Repositories\Contracts\IAgentRepository;
use App\Repositories\Contracts\IApartmentAvailabilityRepository;
use App\Repositories\Contracts\IApartmentRepository;
use App\Repositories\Contracts\ITourAvailabilityRepository;
use App\Repositories\Contracts\ITourRepository;
use App\Repositories\Contracts\ISpaceAvailabilityRepository;
use App\Repositories\Contracts\ISpaceRepository;
use App\Repositories\Contracts\IBeautyRepository;
use App\Repositories\Contracts\ICarAvailabilityRepository;
use App\Repositories\Contracts\ICarRepository;
use App\Repositories\Contracts\ICommentRepository;
use App\Repositories\Contracts\ICouponRepository;
use App\Repositories\Contracts\IEarningsRepository;
use App\Repositories\Contracts\IHotelRepository;
use App\Repositories\Contracts\ILanguageRepository;
use App\Repositories\Contracts\IMediaRepository;
use App\Repositories\Contracts\IMenuRepository;
use App\Repositories\Contracts\IMenuStructureRepository;
use App\Repositories\Contracts\INotificationRepository;
use App\Repositories\Contracts\IOptionRepository;
use App\Repositories\Contracts\IOrderRepository;
use App\Repositories\Contracts\IPageRepository;
use App\Repositories\Contracts\IPostRepository;
use App\Repositories\Contracts\IRoleRepository;
use App\Repositories\Contracts\IRoleUserRepository;
use App\Repositories\Contracts\IRoomAvailabilityRepository;
use App\Repositories\Contracts\IRoomRepository;
use App\Repositories\Contracts\ITaxonomyRepository;
use App\Repositories\Contracts\ITermRelationRepository;
use App\Repositories\Contracts\ITermRepository;
use App\Repositories\Contracts\IUserRepository;
use App\Repositories\Contracts\IWithdrawalRepository;
use App\Repositories\Contracts\ICategoriesRepository;
use App\Repositories\CouponRepository;
use App\Repositories\EarningsRepository;
use App\Repositories\HotelRepository;
use App\Repositories\LanguageRepository;
use App\Repositories\MediaRepository;
use App\Repositories\MenuRepository;
use App\Repositories\MenuStructureRepository;
use App\Repositories\NotificationRepository;
use App\Repositories\OptionRepository;
use App\Repositories\OrderRepository;
use App\Repositories\PageRepository;
use App\Repositories\PostRepository;
use App\Repositories\RoleRepository;
use App\Repositories\RoleUserRepository;
use App\Repositories\RoomAvailabilityRepository;
use App\Repositories\RoomRepository;
use App\Repositories\TaxonomyRepository;
use App\Repositories\TermRelationRepository;
use App\Repositories\TermRepository;
use App\Repositories\UserRepository;
use App\Repositories\WishlistRepository;
use App\Repositories\WithdrawalRepository;
use App\Repositories\CategoriesRepository;
use Illuminate\Support\ServiceProvider;


class CustomRepoServiceProvider extends ServiceProvider
{
   public function register()
   {
      $this->app->bind(IPostRepository::class, function () {
         return new PostRepository(new Post());
      });
      $this->app->bind(ITermRelationRepository::class, function () {
         return new TermRelationRepository(new TermRelation());
      });
      $this->app->bind(ITermRepository::class, function () {
         return new TermRepository(new Term());
      });
      $this->app->bind(IHotelRepository::class, function () {
         return new HotelRepository(new Hotel());
      });
      $this->app->bind(IRoomRepository::class, function () {
         return new RoomRepository(new Room());
      });
      $this->app->bind(ICarRepository::class, function () {
         return new CarRepository(new Car());
      });
      $this->app->bind(IApartmentRepository::class, function () {
         return new ApartmentRepository(new Apartment());
      });
       $this->app->bind(ITourRepository::class, function () {
           return new TourRepository(new Tour());
       });
      $this->app->bind(ISpaceRepository::class, function () {
         return new SpaceRepository(new Space());
      });
      $this->app->bind(IMediaRepository::class, function () {
         return new MediaRepository(new Media());
      });
      $this->app->bind(IPageRepository::class, function () {
         return new PageRepository(new Page());
      });
      $this->app->bind(ITaxonomyRepository::class, function () {
         return new TaxonomyRepository(new Taxonomy());
      });
      $this->app->bind(IOptionRepository::class, function () {
         return new OptionRepository(new Option());
      });
      $this->app->bind(IUserRepository::class, function () {
         return new UserRepository(new User());
      });
      $this->app->bind(IRoomAvailabilityRepository::class, function () {
         return new RoomAvailabilityRepository(new RoomAvailability());
      });
      $this->app->bind(ICarAvailabilityRepository::class, function () {
         return new CarAvailabilityRepository(new CarAvailability());
      });
      $this->app->bind(IApartmentAvailabilityRepository::class, function () {
         return new ApartmentAvailabilityRepository(new ApartmentAvailability());
      });
       $this->app->bind(ITourAvailabilityRepository::class, function () {
           return new TourAvailabilityRepository(new TourAvailability());
       });
      $this->app->bind(ISpaceAvailabilityRepository::class, function () {
         return new SpaceAvailabilityRepository(new SpaceAvailability());
      });
      $this->app->bind(IMenuRepository::class, function () {
         return new MenuRepository(new Menu());
      });
      $this->app->bind(IMenuStructureRepository::class, function () {
         return new MenuStructureRepository(new MenuStructure());
      });
      $this->app->bind(IRoleUserRepository::class, function () {
         return new RoleUserRepository(new RoleUser());
      });
      $this->app->bind(IRoleRepository::class, function () {
         return new RoleRepository(new Role());
      });
      $this->app->bind(ILanguageRepository::class, function () {
         return new LanguageRepository(new Language());
      });
      $this->app->bind(IOrderRepository::class, function () {
         return new OrderRepository(new Order());
      });
      $this->app->bind(ICommentRepository::class, function () {
         return new CommentRepository(new Comment());
      });
      $this->app->bind(IEarningsRepository::class, function () {
         return new EarningsRepository(new Earnings());
      });
      $this->app->bind(IWithdrawalRepository::class, function () {
         return new WithdrawalRepository(new Withdrawal());
      });
      $this->app->bind(ICouponRepository::class, function () {
         return new CouponRepository(new Coupon());
      });
      $this->app->bind(INotificationRepository::class, function () {
         return new NotificationRepository(new Notification());
      });

      $this->app->bind(IBeautyRepository::class, function () {
         return new BeautyRepository(new Beauty());
      });

      $this->app->bind(IAgentRepository::class, function () {
         return new AgentRepository(new Agent());
      });

      $this->app->bind(IAgentAvailabilityRepository::class, function () {
         return new AgentAvailabilityRepository(new AgentAvailability());
      });

      $this->app->bind(IBeautyAvailabilityRepository::class, function () {
         return new BeautyAvailabilityRepository(new BeautyAvailability());
      });

      $this->app->bind(IAgentRelationRepository::class, function () {
         return new AgentRelationRepository(new AgentRelation());
      });

       $this->app->bind(IWishlistRepository::class, function () {
           return new WishlistRepository(new Wishlist());
       });
       $this->app->bind(ISeoRepository::class, function () {
           return new SeoRepository(new Seo());
       });
         $this->app->bind(ICategoriesRepository::class, function () {
         return new CategoriesRepository(new Categories());
      });

   }

   public function provides()
   {
      return [
         IPostRepository::class,
         ITermRelationRepository::class,
         ITermRepository::class,
         IHotelRepository::class,
         IRoomRepository::class,
         ICarRepository::class,
         IApartmentRepository::class,
         ITourRepository::class,
         ISpaceRepository::class,
         IMediaRepository::class,
         IPageRepository::class,
         ITaxonomyRepository::class,
         IOptionRepository::class,
         IUserRepository::class,
         IRoomAvailabilityRepository::class,
         ICarAvailabilityRepository::class,
         IApartmentAvailabilityRepository::class,
         ITourAvailabilityRepository::class,
         ISpaceAvailabilityRepository::class,
         IMenuRepository::class,
         IMenuStructureRepository::class,
         IRoleUserRepository::class,
         IRoleRepository::class,
         ILanguageRepository::class,
         IOrderRepository::class,
         ICommentRepository::class,
         IEarningsRepository::class,
         IWithdrawalRepository::class,
         ICouponRepository::class,
         INotificationRepository::class,
         IBeautyRepository::class,
         IAgentRepository::class,
         IAgentAvailabilityRepository::class,
         IBeautyAvailabilityRepository::class,
         IAgentRelationRepository::class,
         IWishlistRepository::class,
          ICarRepository::class,
           ICategoriesRepository::class,
      ];
   }
}