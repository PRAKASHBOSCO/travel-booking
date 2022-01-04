<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 11/25/20
 * Time: 17:31
 */

namespace App\Repositories;

use App\Models\Media;
use App\Repositories\Contracts\IMediaRepository;

class MediaRepository extends AbstractRepository implements IMediaRepository {
    protected $model = Media::class;
}