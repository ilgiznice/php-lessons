<?php

namespace Models;

class Review extends \Database
{
    public $table = 'reviews';
    public $allowed = ['name', 'phone', 'text'];
}