<?php
/**
 * Created by PhpStorm.
 * User: JreamOQ ( jreamoq@gmail.com )
 * Date: 11/26/20
 * Time: 13:35
 */

namespace App\Repositories\Contracts;


interface IUserRepository extends IBaseRepository
{

    public function getListPartner($number);
}