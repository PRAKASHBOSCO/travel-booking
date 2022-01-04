<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 11/25/20
 * Time: 17:31
 */

namespace App\Repositories;

use App\Models\Notification;
use App\Repositories\Contracts\INotificationRepository;
use Illuminate\Database\Eloquent\Model;

class NotificationRepository extends AbstractRepository implements INotificationRepository {
    protected $model = Notification::class;

    public function __construct(Model $model)
    {
        parent::__construct($model);
    }
}