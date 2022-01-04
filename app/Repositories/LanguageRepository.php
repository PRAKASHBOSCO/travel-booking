<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 11/25/20
 * Time: 17:31
 */

namespace App\Repositories;

use App\Models\Language;
use App\Repositories\Contracts\ILanguageRepository;

class LanguageRepository extends AbstractRepository implements ILanguageRepository {
    protected $model = Language::class;

}