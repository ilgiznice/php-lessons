<?php
/**
 * Created by PhpStorm.
 * User: nice
 * Date: 17.10.17
 * Time: 17:13
 */

namespace Models;


class User
{
    public $table = 'users';
    public $allowed = ['name', 'photo'];
}